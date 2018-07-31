<?php

namespace frontend\components;

use common\helpers\ProfileCompletionColor;
use yii\base\Widget;
use yii\helpers\Url;

class CompaniesRatingWidget extends Widget
{
    public $items;

    /** @var ProfileCompletionColor */
    private $ProfileCompletionColor;


    public function init()
    {
        $this->ProfileCompletionColor = new ProfileCompletionColor();
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

    public function getClass($value)
    {
        return $this->ProfileCompletionColor->getClass($value);
    }

    public function countCases($cases)
    {
        return count($cases);
    }

    public function getRating($object)
    {
        return isset($object['mod_rating']) && !empty($object['mod_rating']) && $object['mod_rating'] != 0 ? $object['mod_rating'] : $object['raiting'];
    }

    public function getTargetUrl($object)
    {
        return \yii\helpers\Html::a($object["name"],  Url::toRoute(['company', 'alias' => $object['alias']]));
    }

}
