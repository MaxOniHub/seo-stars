<?php

namespace common\models;

use common\interfaces\IBasicEntity;
use EvgenyGavrilov\behavior\ManyToManyBehavior;
use Yii;

/**
 * This is the model class for table "conference".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property integer $person_id
 * @property integer $company_id
 * @property string $site
 * @property integer $site_link
 * @property integer $raiting
 * @property integer $reviews
 * @property string $vk_group
 * @property string $fb_group
 * @property string $tags
 * @property string $logo
 * @property string $about
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $seo_desc
 *
 * @property Person $person
 * @property Company $company
 * @property Review[] $reviews0
 */
class Conference extends \yii\db\ActiveRecord implements IBasicEntity
{
    public $activities_ids;

    public function behaviors()
    {
        return [
            ManyToManyBehavior::className()
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['person_id', 'company_id', 'site_link', 'raiting', 'reviews'], 'integer'],
            [['about', 'seo_keys', 'seo_desc'], 'string'],
            [['tags', 'regions', 'activities_ids'], 'safe'],
            [['name', 'alias', 'site', 'vk_group', 'fb_group', 'seo_title'], 'string', 'max' => 255],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => Person::className(), 'targetAttribute' => ['person_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            ['logo','file','skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'checkExtensionByMimeType'=>false]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'alias' => 'name-url',
            'person_id' => 'Персона',
            'company_id' => 'Компания',
            'regions' => 'Регионы',
            'site' => 'Сайт',
            'site_link' => 'Активировать ссылку на сайт',
            'raiting' => 'Рейтинг',
            'reviews' => 'Отзывы',
            'vk_group' => 'Группа Vk',
            'fb_group' => 'Группа Fb',
            'tags' => 'Теги',
            'logo' => 'Лого',
            'about' => 'О конференции',
            'seo_title' => 'SEO Заголовок',
            'seo_keys' => 'SEO Ключевые слова',
            'seo_desc' => 'SEO Описание',
            'activities_ids' => 'Направления деятельности',
        ];
    }


    public function getName()
    {
        return $this->name;
    }

    public function getLogo()
    {
        return Yii::$app->params['imgPath'] . $this->logo;
    }

    public function getRating()
    {
        return $this->raiting;
    }

    public function getAbout()
    {
        return $this->about;
    }

    public function isCompany()
    {
        return $this->company ? true : false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['conference_id' => 'id']);
    }
    public static function getConference($alias)
    {
        return static::find()->where(['alias'=>$alias])->one();        
    }
    public static function getAll()
    {
        return static::find()->orderBy('raiting DESC')->asArray()->all();
    }

    public function getActivities()
    {
        return $this->hasMany(ActivityDirection::className(), ['id' => 'activity_id'])
            ->viaTable('conferences_activities', ['conference_id' => 'id']);
    }

}
