<?php

namespace common\models;

use Yii;

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
class CaseSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'case_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['caseTotalNum', 'caseFailedNum'], 'integer'],
            [['caseStartTime', 'caseEndTime', 'creatTime'], 'safe'],
            [['packageName', 'module', 'lable'], 'string', 'max' => 200],
            [['version'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'packageName' => '包名',
            'version' => '版本号',
            'module' => '模块名称',
            'lable' => '标签',
            'caseTotalNum' => 'case总数',
            'caseFailedNum' => 'case失败条数',
            'caseStartTime' => 'case开始时间',
            'caseEndTime' => 'case结束时间',
            'creatTime' => '创建时间',
        ];
    }

    public function getFailCases()
    {
        return $this->hasMany(CaseFailedDetail::className(), ['summaryId' => 'id']);
    }
}
