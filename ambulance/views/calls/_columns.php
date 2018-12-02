<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'patient_id',
        'value' => function ($item) {
            /** @var $item \app\models\Calls */
            $patient = \app\models\Patient::findOne(['id' => $item->patient_id]);
            return $patient->name;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'address',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'comment',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'datetime',
        'value' => function ($item) {
            return date( "d.m.Y H:i:s", $item->datetime);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'diagnosys_id',
        'value' => function ($item) {
            $patient = \app\models\Diagnosis::findOne(['id' => $item->diagnosys_id]);
            return $patient->name;
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Симптоми',
        'value' => function ($item) {
            $result = '';
            $symptoms = \app\models\CallsSymptoms::findAll(['calls_id' => $item->id]);
            foreach ($symptoms as $data) {
                $Symptom = \app\models\Symptoms::findOne(['id' => $data['symptoms_id']]);
                $result .= $Symptom->name . ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Бригада',
        'value' => function ($item) {
            $result = '';
            $symptoms = \app\models\CallsBrigades::findAll(['calls_id' => $item->id]);
            foreach ($symptoms as $data) {
                $Symptom = \app\models\Brigades::findOne(['id' => $data['brigades_id']]);
                $result .= $Symptom->number . ', ';
            }
            return substr($result, 0, -2);
        }
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'isProfiled',
        'value' => function ($item) {
            if ($item->isProfiled == 1) {
                return 'Так';
            } else {
                return 'Ні';
            }
        }
    ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'diagnosys_id',
    // ],
    // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   