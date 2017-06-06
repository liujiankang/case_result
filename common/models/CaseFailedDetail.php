<?php

namespace common\models;

use Yii;

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
class CaseFailedDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'case_failed_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['summaryId'], 'integer'],
            [['stackLog', 'caseDesc'], 'string'],
            [['creatTime'], 'safe'],
            [['step'], 'string', 'max' => 500],
            [['caseMethod'], 'string', 'max' => 200],
            [['owner'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'summaryId' => 'Summary ID',
            'step' => 'Step',
            'stackLog' => 'Stack Log',
            'caseMethod' => 'Case Method',
            'caseDesc' => 'Case Desc',
            'owner' => 'Owner',
            'creatTime' => 'Creat Time',
        ];
    }
}
