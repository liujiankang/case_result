<?php
namespace frontend\servers;

use common\models\CaseSummary;
use common\models\CaseFailedDetail;

class CaseServer {

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


}