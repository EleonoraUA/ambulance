<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Calls */
/* @var $newModel app\models\CallsSymptoms */
/* @var $form yii\widgets\ActiveForm */

$patients = ArrayHelper::map(\app\models\Patient::find()->all(), 'id', 'name');
$diagnosis = ArrayHelper::map(\app\models\Diagnosis::find()->all(), 'id', 'name');
$symptoms = ArrayHelper::map(\app\models\Symptoms::find()->all(), 'id', 'name');
$isProfiled = [0 => 'Ні', 1 => 'Так'];
$model->datetime = date('d.m.Y H:i:s');
?>

<div class="calls-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row" >
        <div class="col-md-8">
            <?= $form->field($model, 'patient_id')->widget(Select2::classname(), [
                'data' => $patients,
                'language' => Yii::$app->language,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['multiple' => false, 'placeholder' => 'Пацієнт', 'label' => '123'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <div class="checkbox" style="margin-top: 25px">
                <label>
                    <input type="checkbox"> Новий пацієнт
                </label>
            </div>
        </div>
    </div>


    <div class="row" >
        <div class="col-md-8">
            <?= $form->field($newModel, 'symptoms_id')->widget(Select2::classname(), [
                'data' => $symptoms,
                'language' => Yii::$app->language,
                'theme' => Select2::THEME_BOOTSTRAP,
                'options' => ['multiple' => true, 'placeholder' => 'Симптоми'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-4">
            <button style="margin-top: 25px" type="button" id="diagnos" class="btn btn-success">Визначити діагноз</button>
        </div>
    </div>

    <?= $form->field($model, 'diagnosys_id')->widget(Select2::classname(), [
        'data' => $diagnosis,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => false, 'placeholder' => 'Діагноз', 'class' => 'diagnosis'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'address')->textarea() ?>

    <?= $form->field($model, 'comment')->textarea() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'isProfiled')->widget(Select2::classname(), [
        'data' => $isProfiled,
        'language' => Yii::$app->language,
        'theme' => Select2::THEME_BOOTSTRAP,
        'options' => ['multiple' => false, 'placeholder' => 'Профільність'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Створити' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
<script>
    diagnos.onclick = function(event) {
       $('#calls-diagnosys_id').val("1").trigger('change');
       $('#calls-isprofiled').val("1").trigger('change');
    };
</script>