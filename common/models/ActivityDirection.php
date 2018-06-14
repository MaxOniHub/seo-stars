<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "activity_direction".
 *
 * @property integer $id
 * @property string $title
 * @property string $alias
 * @property string $hex_border_color
 * @property integer $is_visible
 * @property array $activities_ids
 */
class ActivityDirection extends \yii\db\ActiveRecord
{
    public $activities_ids = [];
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_direction';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'alias'], 'required'],
            [['is_visible'], 'integer'],
            [['title', 'alias'], 'string', 'max' => 255],
            [['hex_border_color'], 'string', 'max' => 7],
            ['activities_ids', 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t("app", "Название"),
            'alias' => Yii::t("app", "Алиас"),
            'hex_border_color' => Yii::t("app", "Цвет рамки и шрифта"),
            'is_visible' => Yii::t("app", "Показать на главной странице?"),
            'activities_ids' => Yii::t("app", "Направления деятельности"),
        ];
    }
}