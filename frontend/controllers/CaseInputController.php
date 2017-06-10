<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\servers\CaseServer;
use yii\web\Response;

/**
 * Site controller
 */
class CaseInputController extends Controller
{

    public $enableCsrfValidation =false;
    public function init()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $this->enableCsrfValidation = false;
    }

    public function actionInsert()
    {
        $result = ['code' => 0, 'msg' => ''];
        $data = Yii::$app->getRequest()->post();
        $data = array_merge(Yii::$app->getRequest()->get(),$data);


        $summaryData = [];
        $summaryData['packageName'] = isset($data['packageName']) ? $data['packageName'] : '';
        $summaryData['version'] = isset($data['version']) ? $data['version'] : '';
        $summaryData['module'] = isset($data['module']) ? $data['module'] : '';
        $summaryData['platform'] = isset($data['platform']) ? $data['platform'] : '';
        $summaryData['caseTotalNum'] = isset($data['caseTotalNum']) ? $data['caseTotalNum'] : '';
        $summaryData['caseFailedNum'] = isset($data['caseFailedNum']) ? $data['caseFailedNum'] : '';
        $summaryData['caseStartTime'] = isset($data['startTime']) ? date('Y-m-d H:i:s',$data['startTime']) : '';
        $summaryData['caseEndTime'] = isset($data['endTime']) ? date('Y-m-d H:i:s',$data['endTime']) : '';
        $CaseServer = new CaseServer();
        $summaryId = $CaseServer->insertSummary($summaryData);
        Yii::trace($summaryData);
        if (!$summaryId) {
            $result['code'] = 1;
            $result['msg'] = $CaseServer->error;
        } else {
            if (isset($data['method']) && is_array($data['method']) && count($data['method']) > 0) {
                foreach ($data['method'] as $key => $val) {
                    $caseDetailData = [];
                    $caseDetailData['summaryId'] = $summaryId;
                    $caseDetailData['caseMethod'] = isset($data['method'][$key]) ? $data['method'][$key] : '';
                    $caseDetailData['owner'] = isset($data['owner'][$key]) ? $data['owner'][$key] : '';
                    $caseDetailData['caseDesc'] = isset($data['desc'][$key]) ? $data['desc'][$key] : '';
                    $caseDetailData['step'] = isset($data['step'][$key]) ? $data['step'][$key] : '';
                    $caseDetailData['stackLog'] = isset($data['log'][$key]) ? $data['log'][$key] : '';

                    $caseDetailData['step_link'] = isset($data['step_link'][$key]) ? $data['step_link'][$key] : '';
                    $caseDetailData['screen_link'] = isset($data['screen_link'][$key]) ? $data['screen_link'][$key] : '';
                    $caseDetailData['log_link'] = isset($data['log_link'][$key]) ? $data['log_link'][$key] : '';
                    if (!$CaseServer->insertFailedDetail($caseDetailData)) {
                        $result['code'] = 1;
                        $result['msg'] = $CaseServer->error;
                    }
                }
            }
        }
        return $result;
    }

    public function actionSendEmail(){
//        $mail= Yii::$app->mailer->compose('xiaoma',['aa'=>222]);
//        $mail= Yii::$app->mailer->compose();
//        $mail->setFrom('liujiankang@wangcaigu.com')->setTo('liujiankang1@qq.com')
//        $mail->setFrom('yanjunwang@qiyi.com')->setTo('yanjunwang@qiyi.com')
//            ->setSubject('this is test email')
//            ->setTextBody('Plain text content')
//            ->setHtmlBody('<b>HTML content</b>');
//        if($mail->send())
//            echo "success";
//        else
//            echo "failse";
//        die();
    }
}
