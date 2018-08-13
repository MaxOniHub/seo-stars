<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "activity_direction".
 *
 * @property integer $id
 * @property string $title
 * @property string $h1_title
 * @property string $alias
 * @property string $hex_border_color
 * @property integer $is_visible
 * @property string $about
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $seo_desc
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
            [['title', 'h1_title', 'alias'], 'required'],
            [['is_visible'], 'integer'],
            [['title', 'h1_title', 'alias', 'seo_title'], 'string', 'max' => 255],
            [['hex_border_color'], 'string', 'max' => 7],
            ['activities_ids', 'safe'],
            [['seo_keys', 'seo_desc', 'about'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t("app", "Название элемента в рамке"),
            'h1_title' => Yii::t("app", "H1 (Заголовок на странице элемента)"),
            'alias' => Yii::t("app", "Алиас"),
            'hex_border_color' => Yii::t("app", "Цвет рамки и шрифта"),
            'is_visible' => Yii::t("app", "Показать на главной странице?"),
            'activities_ids' => Yii::t("app", "Направления деятельности"),
            'about' => Yii::t("app", "О направления деятельности"),
            'seo_title' => Yii::t("app", "SEO Заголовок"),
            'seo_keys' => Yii::t("app", "SEO Ключевые слова"),
            'seo_desc' => Yii::t("app", "SEO Описание"),
        ];
    }

    public function getTitle()
    {
        return $this->title;
    }
}