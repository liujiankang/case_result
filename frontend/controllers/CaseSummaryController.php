<?php

namespace frontend\controllers;

use frontend\servers\CaseServer;
use Yii;
use frontend\models\CaseFailedDetail;
use frontend\models\CaseSummary;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaseSummaryController implements the CRUD actions for CaseSummary model.
 */
class CaseSummaryController extends Controller
{

    /**
     * Lists all CaseSummary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CaseSummary();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CaseSummary model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $searchModel = new CaseFailedDetail();
        $dataProvider = $searchModel->search(['CaseFailedDetail' => ['summaryId' => (int)$id]]);
        Yii::$app->cache->set('summaryId', $id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDownload()
    {
        $date = Yii::$app->getRequest()->get('date') ? Yii::$app->getRequest()->get('date') : date('Y-m-d');
        $caseServer = new CaseServer();
        $caseSummary = $caseServer->getSummaryDataOfDay($date);
        if (is_array($caseSummary) && count(array_column($caseSummary, 'id')) > 0) {
            $caseFailedDetail = CaseFailedDetail::find()
                ->where(['summaryId' => array_column($caseSummary, 'id')])
                ->asArray()
                ->all();
        } else {
            $caseSummary = [];
            $caseFailedDetail = [];
        }
        $processedData = $caseServer->processSummaryReportData($caseSummary, $caseFailedDetail);
        $fileDir = Yii::$app->params['fileDir'];
        echo $content = $this->renderPartial('summary', $processedData);
//        var_dump($fileDir . "/case_result_{$date}.html");
        $fHand=fopen($fileDir . "/case_result_{$date}.html",'a+');
        fwrite($fHand,$content);
        fclose($fHand);
        //file_put_contents($fileDir . "/case_result_{$date}.html", $content);
        //var_dump([$content, $caseSummary, $caseFailedDetail]);

    }

    /**
     * Finds the CaseSummary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CaseSummary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CaseSummary::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
