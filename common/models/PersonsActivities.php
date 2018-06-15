<?php

namespace common\models;


/**
 * This is the model class for table "persons_activities".
 *
 * @property integer $activity_id
 * @property integer $person_id
 */
class PersonsActivities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persons_activities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'person_id'], 'required'],
            [['activity_id', 'person_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'person_id' => 'Person ID'
        ];
    }
}
