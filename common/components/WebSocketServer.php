<?php

namespace common\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Json;
use yii\web\UnprocessableEntityHttpException;
use Swoole\WebSocket\Server;
use Swoole\Timer;
use common\helpers\ArrayHelper;
use common\websockets\SiteWebSocket;
use common\models\websocket\FdMemberMap;
use common\models\websocket\DataForm;
use common\enums\StatusEnum;

/**
 * Class WebSocketServer
 * @package common\components
 * @author jianyan74 <751393839@qq.com>
 */
class WebSocketServer
{
    protected $host;
    protected $port;
    protected $mode;
    protected $socket_type;
    protected $type;
    protected $config;

    /**
     * 子服务
     *
     * @var
     */
    public $childService = [
        'site' => SiteWebSocket::class,
    ];

    protected $_childService;

    /**
     * 服务
     *
     * @var Server
     */
    protected $server;

    /**
     * 连接id
     *
     * @var
     */
    protected $fd;

    /**
     * 路由
     *
     * @var string
     */
    protected $route;

    /**
     * 路由访问白名单
     *
     * @var array
     */
    protected $routeOptional = [
        'site.login',
        'site.ping',
        'service.login',
    ];

    /**
     * WebSocket constructor.
     * @param $host
     * @param $port
     * @param $config
     */
    public function __construct($host, $port, $mode, $socket_type, $type, $config)
    {
        $this->host = $host;
        $this->port = $port;
        $this->mode = $mode;
        $this->socket_type = $socket_type;
        $this->type = $type;
        $this->config = $config;
    }

    /**
     * 启动进程
     */
    public function run()
    {
        if ($this->type == 'wss') {
            $this->server = new Server($this->host, $this->port, $this->mode, $this->socket_type | SWOOLE_SSL);
        } else {
            $this->server = new Server($this->host, $this->port, $this->mode);
        }

        // 踢所有用户下线
        FdMemberMap::updateAll(['status' => StatusEnum::DISABLED]);

        $this->server->set($this->config);
        $this->server->on('open', [$this, 'onOpen']);
        $this->server->on('message', [$this, 'onMessage']);
        $this->server->on('task', [$this, 'onTask']);
        $this->server->on('finish', [$this, 'onFinish']);
        $this->server->on('close', [$this, 'onClose']);
        $this->server->on('request', [$this, 'onRequest']);
        $this->server->start();
    }

    /**
     * 开启连接
     *
     * @param $server
     * @param $frame
     */
    public function onOpen(Server $server, $request)
    {
        echo "server: handshake success with fd{$request->fd}\n";

        $this->fd = $request->fd;
        $server->push($request->fd, $this->json(2001, '连接成功', ['fd' => $request->fd]));

        // 第一次连接触发
        if ($request->fd === 1) {
            Timer::tick(1000, function(int $timer_id, ...$params) use ($server) {
                // echo "tick: $timer_id \n";

                $data = new DataForm();
                $data->route = 'queueUp.run';
                // 解析路由
                list($controller, $action) = $this->analysisRoute($data->route);
                $this->childService($controller, $server, [], [], $data)->$action();
            });
        }
    }

    /**
     * 消息
     * @param $server
     * @param $frame
     * @throws \Exception
     */
    public function onMessage(Server $server, $frame)
    {
        $this->fd = $frame->fd;

        echo "receive from {}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";

        try {
            // 消息
            $data = new DataForm();
            $data->attributes = Json::decode($frame->data);
            // 格式化内容
            if (!$data->validate()) {
                throw new UnprocessableEntityHttpException($this->analyErr($data->getFirstErrors()));
            }

            // 未登录直接关闭
            $member = [];
            if (!in_array($data->route, $this->routeOptional) && !($member = $this->getFdMemberMap($this->fd))) {
                return $server->disconnect($this->fd, 4001, '登录失败!');
            }

            // 解析路由
            list($controller, $action) = $this->analysisRoute($data->route);
            $this->childService($controller, $server, $frame, $member, $data)->$action();
        } catch (\Exception $e) {
            $error_info = [
                'type' => get_class($e),
                'file' => method_exists($e, 'getFile') ? $e->getFile() : '',
                'errorMessage' => $e->getMessage(),
                'line' => $e->getLine(),
                'stack-trace' => explode("\n", $e->getTraceAsString()),
            ];

            if (YII_DEBUG) {
                $server->push($frame->fd, $this->json(5000, $e->getMessage(), $error_info));
            } else {
                $server->push($frame->fd, $this->json(5000, '服务器内部错误'));
            }

            Yii::error($error_info);
        }

        unset($data);
    }

    /**
     * 接收http触发所有websocket的推送
     *
     * @param \Swoole\Http\Request $request
     * @param \Swoole\Http\Response $response
     */
    public function onRequest(\Swoole\Http\Request $request, \Swoole\Http\Response $response)
    {
        echo "server: http handshake success with fd{$request->fd}\n";

        return false;
        // 接收http请求从get获取message参数的值，给用户推送
        // $this->server->connections 遍历所有websocket连接用户的fd，给所有用户推送
        foreach ($this->server->connections as $fd) {
            // 需要先判断是否是正确的websocket连接，否则有可能会push失败
            if ($this->server->isEstablished($fd)) {
                $this->server->push($fd, $this->json(2000, 'ok', $request->get['message']));
            }
        }
    }

    /**
     * 关闭连接
     *
     * @param $server
     * @param $fd
     */
    public function onClose(Server $server, $fd)
    {
        $this->fd = $fd;
        if ($server->isEstablished($fd)) {
            $server->push($fd, $this->json(4000, '连接已被断开', ['fd' => $fd]));
        }

        // 用户下线
        FdMemberMap::updateAll(['status' => StatusEnum::DISABLED], ['fd' => $fd]);

        echo "client {$fd} closed" . PHP_EOL;
    }

    /**
     * 处理异步任务
     *
     * @param Server $server
     * @param $task_id
     * @param $from_id
     * @param $data
     * @throws InvalidConfigException
     * @throws UnprocessableEntityHttpException
     */
    public function onTask(Server $server, $task_id, $from_id, $taskData)
    {
        $this->fd = $from_id;

        echo "新 AsyncTask[id=$task_id]" . PHP_EOL;

        // 消息
        $data = new DataForm();
        $data->attributes = Json::decode($taskData);
        // 格式化内容
        if (!$data->validate()) {
            throw new UnprocessableEntityHttpException($this->analyErr($data->getFirstErrors()));
        }

        // 解析路由
        list($controller, $action) = $this->analysisRoute($data->route);
        $this->childService($controller, $server, [], [], $data)->$action();

        $server->finish($data);
    }

    /**
     * 处理异步任务的结果
     *
     * @param $server
     * @param $task_id
     * @param $data
     */
    public function onFinish(Server $server, $task_id, $data)
    {
        echo "AsyncTask[$task_id] 完成: $data" . PHP_EOL;
    }

    /**
     * 解析路由
     *
     * @param $route
     * @return array
     * @throws UnprocessableEntityHttpException
     */
    public function analysisRoute($route)
    {
        $runAction = explode('.', $route);
        if (count($runAction) != 2) {
            throw new UnprocessableEntityHttpException('路由请求错误');
        }

        // 对应方法
        $action = 'action' . ucfirst(strtolower($runAction[1]));

        return [$runAction[0], $action];
    }

    /**
     *
     * @param $childServiceName
     * @param $server
     * @param $frame
     * @param DataForm $data
     * @return mixed
     * @throws InvalidConfigException
     */
    protected function childService($childServiceName, $server, $frame, $member, DataForm $data)
    {
        if (!isset($this->_childService[$childServiceName])) {
            $childService = $this->childService;

            if (isset($childService[$childServiceName])) {
                $service = $childService[$childServiceName];
                $this->_childService[$childServiceName] = Yii::createObject($service);
            } else {
                throw new InvalidConfigException('Child Service [' . $childServiceName . '] is not find in ' . get_called_class() . ', you must config it! ');
            }
        }

        $this->_childService[$childServiceName]->server = $server;
        $this->_childService[$childServiceName]->frame = $frame;
        $this->_childService[$childServiceName]->member = $member;
        $this->_childService[$childServiceName]->token = $data->token;
        $this->_childService[$childServiceName]->route = $data->route;
        $this->_childService[$childServiceName]->params = $data->params;

        return $this->_childService[$childServiceName];
    }

    /**
     * 返回json数据格式
     *
     * @param int $code 状态码
     * @param string $message 返回的报错信息
     * @param array|object $data 返回的数据结构
     */
    protected function json($code = 4003, $message = '未知错误', $data = [])
    {
        $result = [
            'code' => strval($code),
            'message' => trim($message),
            'data' => $data ? ArrayHelper::toArray($data) : [],
            'route' => $this->route,
            'member' => [],
            'timestamp' => time(),
        ];

        return Json::encode($result);
    }

    /**
     * 解析错误
     *
     * @param $fistErrors
     * @return string
     */
    protected function analyErr($firstErrors)
    {
        if (!is_array($firstErrors) || empty($firstErrors)) {
            return false;
        }

        $errors = array_values($firstErrors)[0];
        return $errors ?? '未捕获到错误信息';
    }

    /**
     * 获取用户信息
     *
     * @return array|\yii\redis\ActiveRecord|null
     */
    protected function getFdMemberMap($fd)
    {
        return FdMemberMap::find()->where([
            'fd' => $fd,
            'status' => StatusEnum::ENABLED,
        ])->one();
    }
}