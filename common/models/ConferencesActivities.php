<?php

namespace common\models;


/**
 * This is the model class for table "conferences_activities".
 *
 * @property integer $activity_id
 * @property integer $conference_id
 */
class ConferencesActivities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conferences_activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'conference_id'], 'required'],
            [['activity_id', 'conference_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'conference_id' => 'Conference ID'
        ];
    }
}
