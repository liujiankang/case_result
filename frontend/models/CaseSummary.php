<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "case_summary".
 *
 * @property integer $id
 * @property string $packageName
 * @property string $version
 * @property string $module
 * @property string $lable
 * @property integer $caseTotalNum
 * @property integer $caseFailedNum
 * @property string $caseStartTime
 * @property string $caseEndTime
 * @property string $creatTime
 */
class CaseSummary extends \common\models\CaseSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'caseTotalNum', 'caseFailedNum'], 'integer'],
            [['packageName', 'version', 'module', 'lable', 'caseStartTime', 'caseEndTime', 'creatTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CaseSummary::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'caseTotalNum' => $this->caseTotalNum,
            'caseFailedNum' => $this->caseFailedNum,

        ]);

        $query->andFilterWhere(['like', 'packageName', $this->packageName])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'lable', $this->lable])
            ->andFilterWhere(['like', 'caseStartTime', $this->caseStartTime])
            ->andFilterWhere(['like', 'caseEndTime', $this->caseEndTime])
            ->andFilterWhere(['like', 'creatTime', $this->creatTime])
        ;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
}
