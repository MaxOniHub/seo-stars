<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "mainpage".
 *
 * @property integer $id
 * @property string $title1
 * @property string $regions1
 * @property string $tags1
 * @property integer $limit1
 * @property string $sort1
 * @property string $title2
 * @property string $regions2
 * @property string $tags2
 * @property integer $limit2
 * @property string $sort2
 * @property string $title3
 * @property string $regions3
 * @property string $tags3
 * @property integer $limit3
 * @property string $sort3
 * @property string $title4
 * @property string $regions4
 * @property string $tags4
 * @property integer $limit4
 * @property string $sort4
 */
class Mainpage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mainpage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title1', 'limit1', 'title2', 'limit2', 'title3', 'limit3', 'title4', 'limit4'], 'required'],
            [['regions1', 'tags1', 'regions2', 'tags2', 'regions3', 'tags3', 'regions4', 'tags4'], 'safe'],
            [['limit1', 'limit2', 'limit3', 'limit4'], 'integer'],
            [['title1', 'sort1', 'title2', 'sort2', 'title3', 'sort3', 'title4', 'sort4'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title1' => 'Заголовок таблицы',
            'regions1' => 'Регионы',
            'tags1' => 'Теги',
            'limit1' => 'Количество записей',
            'sort1' => 'Сортировка',
            'title2' => 'Заголовок таблицы',
            'regions2' => 'Регионы',
            'tags2' => 'Теги',
            'limit2' => 'Количество записей',
            'sort2' => 'Сортировка',
            'title3' => 'Заголовок таблицы',
            'regions3' => 'Регионы',
            'tags3' => 'Теги',
            'limit3' => 'Количество записей',
            'sort3' => 'Сортировка',
            'title4' => 'Заголовок таблицы',
            'regions4' => 'Регионы',
            'tags4' => 'Теги',
            'limit4' => 'Количество записей',
            'sort4' => 'Сортировка',
        ];
    }
}
