<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseSummaryQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'packageName') ?>

    <?= $form->field($model, 'version') ?>

    <?= $form->field($model, 'module') ?>

    <?= $form->field($model, 'lable') ?>

    <?php  echo $form->field($model, 'caseTotalNum') ?>

    <?php  echo $form->field($model, 'caseFailedNum') ?>

    <?php  //echo $form->field($model, 'caseStartTime') ?>

    <?php  //echo $form->field($model, 'caseEndTime') ?>

    <?php  echo $form->field($model, 'creatTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
