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
        'class' => 'kartik\grid\ActionColumn',
        'template' => '{start}',
        'buttons' => [
            'start' => function () {
                return '<button type="button" class="btn btn-default">Розпочати</button>';
            },
        ],
    ],

];   