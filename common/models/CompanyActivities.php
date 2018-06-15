<?php

namespace common\models;


/**
 * This is the model class for table "company_activities".
 *
 * @property integer $activity_id
 * @property integer $entity_id
 * @property integer $entity_type
 */
class CompanyActivities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company_activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'company_id'], 'required'],
            [['activity_id', 'company_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'company_id' => 'Company ID'
        ];
    }
}
