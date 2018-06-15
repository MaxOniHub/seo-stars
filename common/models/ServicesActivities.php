<?php

namespace common\models;


/**
 * This is the model class for table "services_activities".
 *
 * @property integer $activity_id
 * @property integer $company_id
 */
class ServicesActivities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services_activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'service_id'], 'required'],
            [['activity_id', 'service_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'service_id' => 'Service ID'
        ];
    }
}
