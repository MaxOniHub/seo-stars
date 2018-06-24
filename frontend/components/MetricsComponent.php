<?php

namespace frontend\components;

use common\models\Theme;
use yii\base\Component;


/**
 * Class MetricsComponent
 * @package frontend\components
 */
class MetricsComponent extends Component
{
    /**
     * @var
     */
    private $themeSettings;

   public function init()
   {
       parent::init();
       $this->themeSettings = new Theme();
   }

    public function getMetricsScript()
    {
        return $this->themeSettings->findOne(1)->metrics;
    }
}