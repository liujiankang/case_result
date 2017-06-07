<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use common\helper\DateHelp;

/* @var $this yii\web\View */
/* @var $model frontend\models\CaseSummary */
/* @var $searchModel frontend\models\CaseFailedDetail */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Android Daily Run Auto Test Result";
?>
<style>
    .alienLeft {
        text-align: left;
    }

    .alienMid {
        text-align: center;
    }

    .width10P {
        width: 10%;
    }

    .width20P {
        width: 20%;
    }

    .width30P {
        width: 30%;
    }

    .width100P {
        width: 100%;
    }

    .width2X {
        width: 20px;
    }

    .width5X {
        width: 50px;
    }

    .width10X {
        width: 100px;
    }

    .width20X {
        width: 200px;
    }

    .width100X {
        width: 1000px;
    }

</style>

<div class="alienLeft width100X">
    <table border="1px">
        <tr class="width100P">
            <th colspan="5">
                Android Daily Run Auto Test Result
            </th>
        </tr>

        <tr>
            <th colspan="5">
                current version :<?= $report['version']; ?>
            </th>
        </tr>
        <tr>
            <td class="width20P">模块</td>
            <td class="width20P">case总数</td>
            <td class="width20P">失败数</td>
            <td class="width20P">稳定率</td>
            <td class="width20P">运行时间</td>
        </tr>
        <?php foreach ($summaryDate as $summary) { ?>
            <tr>
                <td><?= $summary['module']; ?></td>
                <td><?= $summary['caseTotalNum']; ?></td>
                <td><?= $summary['caseFailedNum']; ?></td>
                <td><?= $summary['successRate']; ?></td>
                <td><?= DateHelp::formatHumanTime($summary['runTime']); ?></td>
            </tr>
        <?php } ?>
    </table>

    <table border="1px">
        <tr>
            <th colspan="6">
                各模块详细错误情况
            </th>
        </tr>

        <tr>
            <td class="width10P">模块</td>
            <td class="width10P">case名称</td>
            <td class="width20P">case描述</td>
            <td class="width20P">步骤</td>
            <td class="width20P">截图</td>
            <td class="width20P">日志</td>
        </tr>
        <?php foreach ($failedData as $one) { ?>
            <tr>
                <td><?php if (!isset($summaryDate[$one['summaryId']]['hadShown'])) {
                        $summaryDate[$one['summaryId']]['hadShown'] = true;
                        echo $summaryDate[$one['summaryId']]['module'];
                    } ?>
                </td>
                <td><?= $one['caseMethod']; ?></td>
                <td><?= $one['caseDesc']; ?></td>
                <td><?= $one['step']; ?></td>
                <td><a href="#">url</a></td>
                <td><?= HTMLPurifier::getInstance()->purify($one['stackLog']); ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
