<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

class CountersTopPageWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $options;

    public $first_title;
    public $first_counter;

    public $second_title;
    public $second_counter;

    public $third_title;
    public $third_counter;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_counter', 'second_counter', 'third_counter'], 'integer'],
            [['first_title', 'second_title', 'third_title', 'key', 'title'], 'string'],
        ];
    }

    public function getView()
    {
        return "_counters_top_page";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->first_counter = $settings["first_counter"];
        $this->first_title = $settings["first_title"];

        $this->second_title = $settings["second_title"];
        $this->second_counter = $settings["second_counter"];

        $this->third_title = $settings["third_title"];
        $this->third_counter = $settings["third_counter"];
    }

    public function getSettings()
    {
        return $this->getAttributes(null, ["key", "title", "options"]);
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getTitle()
    {
        return $this->title;
    }
}