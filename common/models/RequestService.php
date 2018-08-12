<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "request_service".
 *
 * @property string $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $country_code
 * @property string $description
 * @property string $ip
 * @property string $created_at
 * @property string $updated_at
 */
class RequestService extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'ip'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
            [['country_code'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Емейл',
            'phone' => 'Телефон',
            'country_code' => 'Код страны',
            'description' => 'Описание',
            'ip' => 'IP адрес',
            'created_at' => 'Дата заявки',
            'updated_at' => 'Updated At',
        ];
    }

    public function setUserIP($ip)
    {
        $this->ip = $ip;
    }
}
