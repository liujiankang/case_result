<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseFailedDetailQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="case-failed-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'summaryId') ?>

    <?= $form->field($model, 'step') ?>

    <?= $form->field($model, 'stackLog') ?>

    <?= $form->field($model, 'caseMethod') ?>

    <?php // echo $form->field($model, 'caseDesc') ?>

    <?php // echo $form->field($model, 'owner') ?>

    <?php // echo $form->field($model, 'creatTime') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
