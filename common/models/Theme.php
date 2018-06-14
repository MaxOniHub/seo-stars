<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property integer $id
 * @property string $logo_big
 * @property string $logo_small
 * @property string $main_text
 * @property string $main_title
 * @property string $main_keys
 * @property string $main_desc
 * @property string $raiting_h1
 * @property string $raiting_title
 * @property string $raiting_keys
 * @property string $raiting_desc
 * @property string $about_text
 * @property string $about_title
 * @property string $about_keys
 * @property string $about_desc
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_text', 'main_title', 'main_keys', 'main_desc', 'raiting_title', 'raiting_keys', 'raiting_desc', 'about_text', 'about_title', 'about_keys', 'about_desc', 'map_keys', 'map_desc','footer_links','footer_links2','contact_us_desc','contact_us', 'metrics', 'service_h1','service_title','service_keys','service_desc','person_h1','person_tilte','person_keys','person_desc','conference_h1','conference_title','conference_keys','conference_desc',], 'string'],
            [['raiting_h1', 'map_h1', 'map_title','contact_us_title','contact_us_keys'], 'string', 'max' => 255],
            ['wall_cach', 'integer'],
            [['logo_big', 'logo_small'],'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'checkExtensionByMimeType'=>false]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'logo_big' => 'Logo Большое',
            'logo_small' => 'Logo Маленькое',
            'metrics' => 'Метрики',
            'main_text' => 'Текст на главной',
            'wall_cach'=>'Хранение новостей',
            'main_title' => 'СЕО Заголовок главной',
            'main_keys' => 'СЕО Ключевые слова главная',
            'main_desc' => 'СЕО Описание главная',
            'raiting_h1' => 'СЕО Н1 страницы с рейтингом',
            'raiting_title' => 'СЕО заголовок страницы с рейтингом',
            'raiting_keys' => 'СЕО Ключевые слова страницы с рейтингом',
            'raiting_desc' => 'СЕО Описание страницы с рейтингом',
            'map_h1'=>'Карта сайта h1',
            'map_title'=>'СЕО Карта сайта заголовок',
            'map_keys'=>'СЕО Карта сайта ключевые слова',
            'map_desc'=>'СЕО Карта сайта описание',
            'about_text' => 'О нас текст',
            'about_title' => 'СЕО заголовок страницы О нас',
            'about_keys' => 'СЕО Ключевые слова страницы О нас',
            'about_desc' => 'СЕО Описание страницы О нас',
            'contact_us_title'=>'СЕО заголовок страницы Контакты',
            'contact_us_keys'=>'СЕО ключевые слова страницы Контакты',
            'footer_links'=>'Ссылки в первом блоке футора',
            'footer_links2'=>'Ссылки в среднем блоке футора',
            'contact_us_desc'=>'СЕО описание страницы Контакты',
            'contact_us'=>'Текст страницы Контакты',
            'service_h1'=>'Сервисы Заголово Н1',
            'service_title'=>'Сервисы СЕО Заголовок',
            'service_keys'=>'Сервисы СЕО Ключевые слова',
            'service_desc'=>'Сервисы СЕО Описание',
            'person_h1'=>'Персоны Заголово Н1',
            'person_tilte'=>'Персоны СЕО Заголовок',
            'person_keys'=>'Персоны СЕО Ключевые слова',
            'person_desc'=>'Персоны СЕО Описание',
            'conference_h1'=>'Конференции Заголово Н1',
            'conference_title'=>'Конференции СЕО Заголовок',
            'conference_keys'=>'Конференции СЕО Ключевые слова',
            'conference_desc'=>'Конференции СЕО Описание',
        ];
    }
}
