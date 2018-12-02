<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Brigades */

$this->title = Yii::t('app', 'Create Brigades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Brigades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brigades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
