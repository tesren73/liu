<?php

namespace addons\XyStore\merchant\modules\product\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use common\traits\MerchantCurd;
use addons\XyStore\common\models\product\Cate;
use addons\XyStore\merchant\controllers\BaseController;

/**
 * 商品分类
 *
 * Class ProductCateController
 * @package addons\TinyShop\merchant\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class CateController extends BaseController
{
    use MerchantCurd;

    /**
     * @var Cate
     */
    public $modelClass = Cate::class;

    /**
     * Lists all Tree models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Cate::find()
            ->orderBy('sort asc, created_at asc')
            ->andWhere(['merchant_id' => $this->getMerchantId()]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return mixed|string|\yii\console\Response|\yii\web\Response
     * @throws \yii\base\ExitException
     */
    public function actionAjaxEdit()
    {
        $request = Yii::$app->request;
        $id = $request->get('id');
        $model = $this->findModel($id);
        $model->pid = $request->get('pid', null) ?? $model->pid; // 父id

        $this->activeFormValidate($model);
        if ($model->load(Yii::$app->request->post())) {
            return $model->save()
                ? $this->redirect(['index'])
                : $this->message($this->getError($model), $this->redirect(['index']), 'error');
        }

        return $this->renderAjax($this->action->id, [
            'model' => $model,
            'dropDown' => Yii::$app->tinyShopService->productCate->getDropDownForEdit($id),
        ]);
    }
}