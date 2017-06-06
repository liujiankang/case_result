<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CaseFailedDetail */

$this->title = 'Create Case Failed Detail';
$this->params['breadcrumbs'][] = ['label' => 'Case Failed Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-failed-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
