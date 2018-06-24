<?php

namespace frontend\components;

use common\helpers\ProfileCompletionColor;
use yii\base\Widget;
use yii\helpers\Url;

class FullCompaniesRatingWidget extends CompaniesRatingWidget
{

    public function run()
    {
        return $this->render("full-companies-rating-widget/view", ["items" => $this->items, "widget" => $this]);
    }

    public function getCompanyLink($alias)
    {
        return Url::toRoute(['main/company', 'alias'=>$alias]);
    }


}
