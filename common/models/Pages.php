<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $alias
 * @property string $h1
 * @property string $preview_text
 * @property string $h2
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $seo_desc
 * @property string $editor
 * @property string $editor_pos
 * @property string $regions
 * @property string $tags
 * @property integer $limit_rec
 * @property string $sort_by
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'h1', 'add_table'], 'required'],
            [['preview_text', 'seo_keys', 'seo_desc', 'editor'], 'string'],
            [['regions','tags'], 'safe'],
            [['limit_rec', 'add_table'], 'integer'],
            [['alias', 'h1', 'h2', 'seo_title', 'editor_pos', 'sort_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'name-url',
            'h1' => 'Заголовок H1',
            'preview_text' => 'Текст превью',
            'h2' => 'Заголовок H2',
            'seo_title' => 'Seo Заголовок',
            'seo_keys' => 'Seo Ключевые слова',
            'seo_desc' => 'Seo Описание',
            'editor' => 'Текст',
            'editor_pos' => 'Позиция текста',
            'add_table'=>'Добавить таблицу',
            'regions' => 'Регионы',
            'tags' => 'Теги',
            'limit_rec' => 'Количество компаний в таблице (лимит)',
            'sort_by' => 'Сортировать по',
        ];
    }
    public function getAll()
    {
        return static::find()->orderBy('id DESC')->all();
    }
    public function getOneinAlias($alias)
    {
        return static::find()->where(['alias'=>$alias])->one();
    }
}
