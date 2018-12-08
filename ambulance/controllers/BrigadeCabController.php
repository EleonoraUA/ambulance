<?php
/**
 * Created by PhpStorm.
 * User: eleonora
 * Date: 2018-12-08
 * Time: 17:36
 */

namespace app\controllers;


use app\models\CallsSearch;
use Yii;
use yii\web\Controller;

/**
 * Class BrigadeCabController
 * @package app\controllers
 */
class BrigadeCabController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CallsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('main_page', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}