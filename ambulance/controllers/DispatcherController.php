<?php
/**
 * Created by PhpStorm.
 * User: eleonora
 * Date: 2018-12-01
 * Time: 17:26
 */

namespace app\controllers;


use yii\web\Controller;

class DispatcherController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('main_page');
    }
}