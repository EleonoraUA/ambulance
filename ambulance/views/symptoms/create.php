<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Symptoms */

$this->title = Yii::t('app', 'Додати симптом');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Симптоми'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="symptoms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
