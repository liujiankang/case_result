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
 * @property string $step_link
 * @property string $log_link
 * @property string $screen_link
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
            [['summaryId'], 'required'],
            [['summaryId'], 'integer'],
            [['stackLog', 'caseDesc'], 'string'],
            [['creatTime'], 'safe'],
            [['step', 'step_link', 'log_link', 'screen_link'], 'string', 'max' => 500],
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
            'summaryId' => '任务编号',
            'step' => '步骤',
            'stackLog' => '堆栈信息',
            'caseMethod' => '用例名称',
            'caseDesc' => '用例描述',
            'owner' => '作者',
            'creatTime' => '创建时间',
            'step_link' => '步骤 Link',
            'log_link' => '日志 Link',
            'screen_link' => '截屏 Link',
        ];
    }
}
