<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseSummary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-summary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'packageName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'version')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'module')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lable')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caseStartTime')->textInput() ?>

    <?= $form->field($model, 'caseEndTime')->textInput() ?>

    <?= $form->field($model, 'creatTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
