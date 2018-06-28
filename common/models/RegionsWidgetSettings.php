<?php

namespace common\models;

use common\interfaces\IWidgetSettings;
use yii\base\Model;

/**
 * Class RegionsWidgetSettings
 * @package common\models
 */
class RegionsWidgetSettings extends Model implements IWidgetSettings
{
    public $key;
    public $title;

    public $options;

    public $region_name1;
    public $region_name2;
    public $region_name3;
    public $region_name4;
    public $region_name5;

    public $region_link1;
    public $region_link2;
    public $region_link3;
    public $region_link4;
    public $region_link5;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_name1', 'region_name2', 'region_name3', 'region_name4', 'region_name5'], 'string'],
            [['key', 'title'], 'string'],
            [['region_link1', 'region_link2', 'region_link3', 'region_link4', 'region_link5'],'url', 'message' => "Указанное значение не является правильным URL (http(s)://example.com)."]
        ];
    }

    public function getView()
    {
        return "_regions";
    }

    public function initSettings($options)
    {
        $this->key = $options["key"];
        $this->title = $options["title"];

        $settings = $options["options"];
        $this->region_name1 = $settings[0]["region_name"];
        $this->region_name2 = $settings[1]["region_name"];
        $this->region_name3 = $settings[2]["region_name"];
        $this->region_name4 = $settings[3]["region_name"];
        $this->region_name5 = $settings[4]["region_name"];

        $this->region_link1 = $settings[0]["region_link"];
        $this->region_link2 = $settings[1]["region_link"];
        $this->region_link3 = $settings[2]["region_link"];
        $this->region_link4 = $settings[3]["region_link"];
        $this->region_link5 = $settings[4]["region_link"];

    }

    public function getSettings()
    {
        $attributes = $this->getAttributes(null, ["key", "title", "options"]);
        return [
            ["region_name" => $attributes["region_name1"], "region_link" => $attributes["region_link1"]],
            ["region_name" => $attributes["region_name2"], "region_link" => $attributes["region_link2"]],
            ["region_name" => $attributes["region_name3"], "region_link" => $attributes["region_link3"]],
            ["region_name" => $attributes["region_name4"], "region_link" => $attributes["region_link4"]],
            ["region_name" => $attributes["region_name5"], "region_link" => $attributes["region_link5"]]
        ];

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