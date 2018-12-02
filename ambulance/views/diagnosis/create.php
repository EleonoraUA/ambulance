<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diagnosis */

$this->title = Yii::t('app', 'Create Diagnosis');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnoses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
