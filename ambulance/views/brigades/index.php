<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BrigadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Бригади');
?>
<div id="map_canvas" style="width: 120px; height:60px;"></div>
<div class="brigades-index" style="margin-top: -120px">

    <div class="alert alert-info">Бригади підстанції №1</div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Додати бригаду'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            'state',
            'station_id',
            [
                    'attribute' => 'coordinates',
                'value' => function () {
                    $array = ['Проспект перемоги', "проспект Генерала Наумова", "вулиця Коршунська", "вулиця Лісова"];
        return $array[rand(0, 3)];
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<button type="button" class="btn btn-default">Default</button>
<script type="text/javascript">

</script>