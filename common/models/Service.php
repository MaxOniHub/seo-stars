<?php

namespace common\models;

use common\interfaces\IBasicEntity;
use EvgenyGavrilov\behavior\ManyToManyBehavior;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "service".
 *
 * @property integer $id
 * @property string $name
 * @property string $alias
 * @property string $site
 * @property integer $site_link
 * @property integer $raiting
 * @property integer $reviews
 * @property string $vk_group
 * @property string $fb_group
 * @property string $tags
 * @property string $logo
 * @property string $about
 * @property string $email
 * @property string $tel
 * @property string $seo_title
 * @property string $seo_keys
 * @property string $seo_desc
 *
 * @property Person[] $people
 * @property Review[] $reviews0
 */
class Service extends \yii\db\ActiveRecord implements IBasicEntity
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
        return 'service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'alias'], 'required'],
            [['site_link', 'raiting', 'reviews'], 'integer'],
            [['tags', 'activities_ids'], 'safe'],
            [['about', 'seo_keys', 'seo_desc'], 'string'],
            [['name', 'alias', 'site', 'vk_group', 'fb_group', 'email', 'tel', 'seo_title'], 'string', 'max' => 255],
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
            'site' => 'Сайт',
            'site_link' => 'Активировать ссылку на сайт',
            'raiting' => 'Рейтинг',
            'reviews' => 'Отзывы',
            'vk_group' => 'Группа Vk',
            'fb_group' => 'Группа Fb',
            'tags' => 'Теги',
            'logo' => 'Лого',
            'about' => 'О Сервисе',
            'email' => 'Email',
            'tel' => 'Телефон',
            'seo_title' => 'SEO Заголовок',
            'seo_keys' => 'SEO Ключевые слова',
            'seo_desc' => 'SEO Описание',
            'activities_ids' => 'Направления деятельности',
        ];
    }
    public $peoples_string="";
    public function afterFind()
    {
        if(isset($this->persons))
        {
            $i=0;
            foreach($this->persons as $person)
            {
                if($i!=0)
                    $this->peoples_string.=', ';
                $this->peoples_string.=' <a data-pjax="0" href="'.Url::toRoute(['person/person', 'alias'=>$person->alias]).'">'.$person->name.'</a> ';
                $i=1;
            }
        }
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersons()
    {
        return $this->hasMany(Person::className(), ['service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['service_id' => 'id']);
    }
    
    public static function getService($alias)
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
            ->viaTable('services_activities', ['service_id' => 'id']);
    }


}
