<?php

namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class CompanyClientsWidget extends Widget
{

    public $items;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("company-clients-widget/view", ["items" => $this->getItems()]);
    }

    public function getItems()
    {
        return explode(",", $this->items);
    }

}
