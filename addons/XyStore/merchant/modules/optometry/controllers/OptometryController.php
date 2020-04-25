<?php

namespace addons\XyStore\merchant\modules\optometry\controllers;

use Yii;
use common\models\base\SearchModel;
use common\traits\MerchantCurd;
use common\enums\StatusEnum;
use addons\XyStore\common\models\optometry\Optometry;
use addons\XyStore\merchant\controllers\BaseController;

/**
 * 验光列表
 *
 * Class OptometryController
 * @package addons\XyStore\merchant\modules\optometry\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class OptometryController extends BaseController
{
    use MerchantCurd;

    /**
    * @var Optometry
    */
    public $modelClass = Optometry::class;


    /**
    * 首页
    *
    * @return string
    * @throws \yii\web\NotFoundHttpException
    */
    public function actionIndex()
    {
        $searchModel = new SearchModel([
            'model' => $this->modelClass,
            'scenario' => 'default',
            'partialMatchAttributes' => [], // 模糊查询
            'defaultOrder' => [
//                'sort' => SORT_ASC,
                'id' => SORT_DESC
            ],
            'pageSize' => $this->pageSize
        ]);

        $dataProvider = $searchModel
            ->search(Yii::$app->request->queryParams);
        $dataProvider->query
            ->andWhere(['status' => StatusEnum::ENABLED])
            ->andWhere(['merchant_id' => $this->getMerchantId()]);

        return $this->render($this->action->id, [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }
    public function actionEdit()
    {
        $request = Yii::$app->request;
        $id = $request->get('id', null);
        $model = $this->findModel($id);
        if ($model->load($request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render($this->action->id, [
            'model' => $model,
            'member' => Yii::$app->xyStoreService->member->getMapList(),
            'merchantMember' => Yii::$app->xyStoreService->merchantMember->getMapList(),
        ]);
    }

}