<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseFailedDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Case Failed Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-failed-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'summaryId',
            'step',
            'stackLog:ntext',
            'caseMethod',
            'caseDesc:ntext',
            'owner',
            'step_link',
            'log_link',
            'screen_link',
            'creatTime',
        ],
    ]) ?>

</div>
