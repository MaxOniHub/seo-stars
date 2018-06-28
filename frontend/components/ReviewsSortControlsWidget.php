<?php

namespace frontend\components;

use common\helpers\ProfileCompletionColor;
use yii\base\Widget;

class ReviewsSortControlsWidget extends Widget
{
    public $alias;

    public $target_url;

    public $sort;

    public $sort_desc;

    public function init()
    {

        parent::init();
    }

    public function run()
    {
        return $this->render("review-sort-control-widget/view", [
            "alias" => $this->alias,
            "target_url" => $this->target_url,
            "sort" => $this->sort,
            "sort_desc" => $this->sort_desc
        ]);
    }



}
