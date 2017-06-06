<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseSummary */
/* @var $searchModel frontend\models\CaseFailedDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Case Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'packageName',
//            'version',
//            'module',
//            'lable',
//            'caseTotalNum',
            'caseFailedNum',
//            'caseStartTime',
//            'caseEndTime',
//            'creatTime',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn','template' => '{view}','urlCreator'=>function($action, $model, $key, $index){
                return "/case-failed/$action?id=$model->id";
            }],

//            'id',
//            'summaryId',
//            'stackLog:ntext',
            'caseMethod',
            'caseDesc:ntext',
            'owner',
//            'creatTime',
            'step',

        ],
    ]); ?>

</div>
