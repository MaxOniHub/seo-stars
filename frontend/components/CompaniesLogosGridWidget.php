<?php

namespace frontend\components;

use yii\base\Widget;

class CompaniesLogosGridWidget extends Widget
{
    const template_1 = 1;
    const template_2 = 2;

    public $items;

    public $target_url;

    public $template = 1;

    private $img_dir = "/frontend/web/mt/img/";

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render("companies-logos-grid-widget/view".$this->template, ["items" => $this->items, "img_dir" => $this->img_dir, "target_url" => $this->target_url]);
    }

}
