<?php

namespace frontend\controllers;

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
        Yii::$app->cache->set('summaryId',$id);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDownload(){
        $date=Yii::$app->getRequest()->get('date')?Yii::$app->getRequest()->get('date'):date('Y-m-d');
        $caseSummary=CaseSummary::find()
            ->where("DATE_FORMAT(caseStartTime,'%Y-%m-%d') = '$date'")
            ->asArray()
            ->all();
        $Summary=[];
        $Summary['caseSum']=array_sum(array_column($caseSummary,'caseTotalNum'));
        $Summary['caseFailedSum']=array_sum(array_column($caseSummary,'caseFailedNum'));
        $Summary['caseSumId']=implode(',',array_column($caseSummary,'id'));
        $Summary['version']=implode(',',array_unique(array_column($caseSummary,'version')));
        $Summary['packageName']=implode(',',array_unique(array_column($caseSummary,'packageName')));

        $caseFailedDetail=CaseFailedDetail::find()
            ->where(['summaryId'=>$Summary['caseSumId']])->orderBy('')->asArray()->all();
        var_dump($Summary);

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
