<?php

namespace frontend\components;

use common\data_mappers\ActivityDirectionDataMapper;
use common\models\ActivityDirection;
use Yii;
use yii\base\Widget;

/**
 * Class PopularActivityDirectionsWidget
 * @package frontend\components
 */
class PopularActivityDirectionsWidget extends Widget
{
    const vertical_type = "vertical";
    const vertical_view_name = "view-vertical";

    const basic_type = "basic";
    const basic_view_name = "view";

    public $template = self::basic_type;

    public $items;

    /** @var ActivityDirectionDataMapper **/
    protected $ActivityDirectionDataMapper;

    public function init()
    {
        parent::init();

        $this->ActivityDirectionDataMapper = new ActivityDirectionDataMapper(new ActivityDirection());
    }

    public function run()
    {
        $this->loadData();

        return $this->render("popular-activity-directions-widget/".$this->getTemplateName(), ["items" => $this->items]);
    }

    protected function getTemplateName()
    {
        return $this->template == self::basic_type ? self::basic_view_name : self::vertical_view_name;
    }

    protected function loadData()
    {
        if (empty($this->items))
            $this->items = $this->ActivityDirectionDataMapper->getReadyToViewActivities();
    }

}
