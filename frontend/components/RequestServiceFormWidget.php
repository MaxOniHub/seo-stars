<?php

namespace frontend\components;

use yii\base\Widget;

class RequestServiceFormWidget extends Widget
{
    public $filed_offset = 8;

    public $label_offset = 3;

    public $model;

    private $base_url;

    public function init()
    {
        parent::init();

        $this->base_url = \Yii::$app->request->getHostInfo().\Yii::$app->request->getUrl();
    }

    public function run()
    {
        return $this->render("request-service-form-widget/view", ["widget" => $this]);
    }

    public function getLabelColumnOffset()
    {
        return "col-md-".$this->label_offset;
    }

    public function getFieldColumnOffset()
    {
        return "col-md-".$this->filed_offset;
    }


}

