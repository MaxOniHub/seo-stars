<?php

namespace frontend\components;

use common\helpers\ProfileCompletionColor;
use yii\base\Widget;

class CompaniesRatingWidget extends Widget
{
    public $items;

    /** @var ProfileCompletionColor */
    private $ProfileCompletionColor;

    public function init()
    {
        $this->ProfileCompletionColor = \Yii::createObject(ProfileCompletionColor::class);
        parent::init();
    }

    public function run()
    {
        return $this->render("companies-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getColor($value)
    {
        return $this->ProfileCompletionColor->getColor($value);
    }

    public function countCases($cases)
    {
        return count($cases);
    }

}
