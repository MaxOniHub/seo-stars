<?php

namespace common\models;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property string $text
 * @property integer $user_id
 * @property integer $company_id
 * @property integer $stars
 * @property string $date
 * @property integer $raiting
 * @property integer $likes
 * @property string $user_ids_like
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public $color;
    public $strip;
    public $gisturl;
    public $gistname;
    
    public function afterFind()
    {
        $arr=[1=>"#f7dcdc",2=>"#f7e9dc",3=>"#f7f7dc",4=>"#ecf7dc",5=>"#dcf7de"];
        $this->color=$arr[$this->stars];
        
        if($this->ball >= 10 && $this->ball<20)
            $this->strip = "#EB4825";
        else if($this->ball >= 20 && $this->ball < 30)
            $this->strip = "#EF6D21";
        else if($this->ball >= 30 && $this->ball < 40)
            $this->strip = "#F29923";
        else if($this->ball >= 40 && $this->ball < 60)
            $this->strip = "#F3CD2E";
        else if($this->ball >= 60 && $this->ball < 80)
            $this->strip = "#EEE736";
        else if($this->ball >= 80 && $this->ball < 90)
            $this->strip = "#8DC142";
        else if($this->ball >= 90 && $this->ball <= 100)
            $this->strip = "#4CB767";
        //$this->date=date("d:m:Y",$this->date);
        
        if($this->company_id){
            $this->gisturl=Url::toRoute(['main/company', 'alias'=>$this->company->alias]);
            $this->gistname=$this->company->name;
        }
        elseif($this->person_id){
            $this->gisturl=Url::toRoute(['person/person', 'alias'=>$this->person->alias]);
            $this->gistname=$this->person->name;
        }
        elseif($this->service_id){
            $this->gisturl=Url::toRoute(["service/service", 'alias'=>$this->service->alias]);
            $this->gistname=$this->service->name;
        }
        elseif($this->conference_id){
            $this->gisturl=Url::toRoute(["conference/conference", 'alias'=>$this->conference->alias]);
            $this->gistname=$this->conference->name;
        }
    }
    public function rules()
    {
        return [
            [['text', 'user_id', 'stars', 'date', 'likes'], 'required'],
            [['text','user_ids_like','user_ids_dislike'], 'string'],
            [['user_id', 'company_id', 'stars', 'raiting', 'likes', 'ball', 'service_id', 'person_id', 'conference_id'], 'integer'],
            [['date'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Комментарий',
            'user_id' => 'Пользователь',
            'company_id' => 'Компания',
            'stars' => 'Звезд',
            'date' => 'Дата',
            'raiting' => 'Rейтинг',
            'likes' => 'Лайков',
            'user_ids_like' => 'User Ids Like',
            'user_ids_like' => 'User Ids DisLike',
            'service_id'=>'Сервис', 
            'person_id'=>'Персона', 
            'conference_id'=>'Конференция'
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id'=>'company_id']);
    }
    public function getPerson()
    {
        return $this->hasOne(Person::className(), ['id'=>'person_id']);
    }
    public function getService()
    {
        return $this->hasOne(Service::className(), ['id'=>'service_id']);
    }
    public function getConference()
    {
        return $this->hasOne(Conference::className(), ['id'=>'conference_id']);
    }
    public static function getAllComments($id, $gist, $sort, $sort_desc)
    {
        if(!$sort)
            $sort="date";
        else if($sort=="popular")
            $sort="likes";
        else
            $sort="stars";
        $query= static::find()->where([''.$gist.''=>$id]);
        if(!$sort_desc)
            $query=$query->orderBy($sort.' DESC')->all();
        else
            $query=$query->orderBy($sort)->all();
        return $query;
    }
    public function getLast()
    {
        return static::find()->orderBy('id DESC')->limit(3)->all();
    }
}
