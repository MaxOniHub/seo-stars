<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banners".
 *
 * @property integer $id
 * @property string $href
 * @property string $photo
 * @property integer $position
 */
class Banner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'banners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['href'], 'required'],
            [['position'], 'integer'],
            [['href', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'href' => 'Ссылка',
            'photo' => 'Картинка',
            'position' => 'Позиция',
        ];
    }
    public static function findBanners()
    {
        return Banner::find()->orderBy('position')->all();
    }
}
