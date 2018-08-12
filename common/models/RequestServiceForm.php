<?php

namespace common\models;

use yii\base\Model;

class RequestServiceForm extends Model
{
    public $name;
    public $email;
    public $phone;
    public $site;
    public $description;
    public $country_code;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            [['name', 'description', 'phone', 'site', 'country_code'], 'string'],
            [['email'], 'email']
        ];
    }

    public function attributeLabels()
    {
        return [
            "name" => "Имя",
            "email" => "Емейл",
            "phone" => "Телефон",
            "description" => "Описание",
            "site" => "Сайт"
        ];
    }
}