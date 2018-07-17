<?php

namespace frontend\components;

use common\models\Theme;
use yii\base\Component;


/**
 * Class MetricsComponent
 * @package frontend\components
 */
class ThemeComponent extends Component
{
    /**
     * @var
     */
    private $themeSettings;

    private $settings;

    public function init()
    {
        parent::init();
        $this->themeSettings = new Theme();

        $this->loadSettings();
    }

    public function getMetricsScript()
    {
        return $this->settings->metrics;
    }

    public function getFooterLinks()
    {
        return $this->settings->footer_links;
    }

    private function loadSettings()
    {
        $this->settings = $this->themeSettings->findOne(1);
    }
}