<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CaseSummaryQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Case Summaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="case-summary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['class' => 'yii\grid\ActionColumn','template' => '{view}'],
//            'id',
            'packageName',
            'version',
            'module',
            'lable',
             'caseTotalNum',
            'caseFailedNum',
            [
                'label' => '失败率',
                'value' => function ($model) {
                    if ($model->caseTotalNum >= 1) {
                        return round($model->caseFailedNum / $model->caseTotalNum, 2)*100 .' %';
                    } else {
                        return 0;
                    }
                },
                'headerOptions' => ['width' => '120']
            ],
             'caseStartTime',
//             'caseEndTime',
            [
                'label' => '运行时间',
                'attribute' => 'pro_name',
                'value' => function ($model) {
                    if (strtotime($model->caseStartTime) < 1 || strtotime($model->caseEndTime) < 1) {
                        return '0 s';
                    } else {
                        $secends = strtotime($model->caseEndTime) - strtotime($model->caseStartTime);
                        if ($secends > 3600) {
                            return '> 1h';
                        } elseif ($secends < 60) {
                            return "$secends s";
                        } else {
                            return (int)($secends / 60) . 'min ' . ($secends % 60) . ' s';
                        }
                    }
                },
                'headerOptions' => ['width' => '120']
            ],
             'creatTime',
        ],
    ]); ?>
</div>
