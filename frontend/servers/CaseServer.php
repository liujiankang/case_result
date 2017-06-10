<?php
namespace frontend\servers;

use common\models\CaseSummary;
use common\models\CaseFailedDetail;

class CaseServer
{

    public $error;

    public function insertSummary($data)
    {
        $summary = new CaseSummary();
        $summary->attributes = $data;
        $summary->id = null;
        if ($summary->save()) {
            return $summary->id;
        } else {
            $this->error = current($summary->getErrors());
        }
        return !$this->error;
    }

    public function insertFailedDetail($data)
    {
        $CaseFailedDetail = new CaseFailedDetail();
        $CaseFailedDetail->attributes = $data;
        $CaseFailedDetail->id = null;
        if ($CaseFailedDetail->save()) {
            return $CaseFailedDetail->id;
        } else {
            $this->error = current($CaseFailedDetail->getErrors());

        }
        return !$this->error;
    }

    public function processSummaryReportData($summaryData, $failedData)
    {
        $processedSummaryData = [];
        foreach ($summaryData as $one) {
            $one['realFailedNum'] = 0;
            $one['runTime'] = strtotime($one['caseEndTime']) - strtotime($one['caseStartTime']);
            if ($one['caseTotalNum'] == 0) {
                $one['failedRate'] = 0;
                $one['successRate'] = 1;
            } else {
                $one['failedRate'] = $one['caseFailedNum'] / $one['caseTotalNum'];
                $one['successRate'] = 1 - $one['failedRate'];
            }
            $processedSummaryData[$one['id']] = $one;
        }

        foreach ($failedData as $one) {
            $processedSummaryData[$one['summaryId']]['realFailedNum'] += 1;
        }

        $Summary = [];
        $Summary['caseSum'] = array_sum(array_column($summaryData, 'caseTotalNum'));
        $Summary['caseFailedSum'] = array_sum(array_column($summaryData, 'caseFailedNum'));
        $Summary['version'] = implode(',', array_unique(array_column($summaryData, 'version')));

        return ['report' => $Summary, 'summaryDate' => $processedSummaryData, 'failedData' => $failedData];
    }

    public function getSummaryDataOfDay($date, $format = '%Y-%m-%d')
    {
        return CaseSummary::find()
            ->where("DATE_FORMAT(caseStartTime,'$format') = '$date'")
            ->asArray()
            ->all();
    }

}