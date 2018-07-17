<?php

namespace frontend\components;

use common\data_mappers\ActivityDirectionDataMapper;
use Yii;
use yii\base\Widget;

/**
 * Class PopularActivityDirectionsWidget
 * @package frontend\components
 */
class CompanyActivityDirectionsWidget extends PopularActivityDirectionsWidget
{

    public function run()
    {
        if (!$this->loadData()) return false;

        return $this->render("popular-activity-directions-widget/".$this->getTemplateName(), ["items" => $this->items]);
    }

    protected function loadData()
    {
        return  empty($this->items) ? false : $this->items;

    }

}
