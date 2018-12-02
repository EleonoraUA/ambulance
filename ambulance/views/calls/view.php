<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Calls */
?>
<div class="calls-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'patient_id',
                'value' => function () use ($model) {
                    return \app\models\Patient::findOne(['id' => $model->patient_id])->name;
                }
            ],
            [
                'attribute' => 'Бригада №',
                'value' => function () use ($model) {
                    $result = '';
                    $symptoms = \app\models\CallsBrigades::findAll(['calls_id' => $model->id]);
                    foreach ($symptoms as $data) {
                        $Symptom = \app\models\Brigades::findOne(['id' => $data['brigades_id']]);
                        $result .= $Symptom->number . ', ';
                    }
                    return substr($result, 0, -2);
                }
            ],
            'address',
            'comment',
            [
                'attribute' => 'datetime',
                'value' => function () use ($model) {
                    return (new DateTime())->setTimestamp($model->datetime)->format('d.m.Y H:i:s');
                }
            ],
            [
                'attribute' => 'isProfiled',
                'value' => function () use ($model) {
                    if ($model->isProfiled == 1) {
                        return "Так";
                    } else {
                        return "Ні";
                    }
                }
            ],
            [
                'attribute' => 'diagnosys_id',
                'value' => function () use ($model) {
                    return \app\models\Diagnosis::findOne(['id' => $model->diagnosys_id])->name;
                }
            ],
            [
                'attribute' => 'Симптоми',
                'value' => function () use ($model) {
                    $result = '';
                    $symptoms = \app\models\CallsSymptoms::findAll(['calls_id' => $model->id]);
                    foreach ($symptoms as $data) {
                        $Symptom = \app\models\Symptoms::findOne(['id' => $data['symptoms_id']]);
                        $result .= $Symptom->name . ', ';
                    }
                    return substr($result, 0, -2);
                }
            ],
            'id',
        ],
    ]) ?>
    <button type="button" class="btn btn-danger">Скасувати виклик</button>
    <button type="button" class="btn btn-warning">Змінити бригаду</button>

</div>