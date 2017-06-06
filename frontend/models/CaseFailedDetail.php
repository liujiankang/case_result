<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
/**
 * This is the model class for table "case_failed_detail".
 *
 * @property integer $id
 * @property integer $summaryId
 * @property string $step
 * @property string $stackLog
 * @property string $caseMethod
 * @property string $caseDesc
 * @property string $owner
 * @property string $creatTime
 */
class CaseFailedDetail extends \common\models\CaseFailedDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'summaryId'], 'integer'],
            [['step', 'stackLog', 'caseMethod', 'caseDesc', 'owner', 'creatTime'], 'safe'],
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
        $query = CaseFailedDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        var_dump($params);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'summaryId' => $this->summaryId,
            'creatTime' => $this->creatTime,
        ]);

        $query->andFilterWhere(['like', 'step', $this->step])
            ->andFilterWhere(['like', 'stackLog', $this->stackLog])
            ->andFilterWhere(['like', 'caseMethod', $this->caseMethod])
            ->andFilterWhere(['like', 'caseDesc', $this->caseDesc])
            ->andFilterWhere(['like', 'owner', $this->owner]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
}
