<?php
/**
 * Created by PhpStorm.
 * User: eleonora
 * Date: 2018-12-08
 * Time: 15:10
 */

namespace app\controllers;


use yii\web\Controller;

/**
 * Class PatientCabController
 * @package app\controllers
 */
class PatientCabController extends Controller
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