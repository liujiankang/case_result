<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseFailedDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-failed-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'summaryId')->textInput() ?>

    <?= $form->field($model, 'step')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stackLog')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'caseMethod')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caseDesc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'owner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creatTime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
