<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseFailedDetail */

$this->title = 'Update Case Failed Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Case Failed Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="case-failed-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
