<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "widgets_settings".
 *
 * @property string $key
 * @property string $title
 * @property string $options
 */
class WidgetsSettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'widgets_settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['options'], 'string'],
            [['key'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'key' => 'Key',
            'title' => 'Title',
            'options' => 'Options',
        ];
    }

    public function afterFind()
    {
        $this->options = unserialize($this->options);
        parent::afterFind(); // TODO: Change the autogenerated stub
    }
}