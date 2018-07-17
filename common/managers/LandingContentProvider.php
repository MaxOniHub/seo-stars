<?php


namespace common\managers;

use common\data_mappers\ActivityDirectionDataMapper;
use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\models\Company;
use common\models\CompanyRatings;
use common\models\Mainpage;
use common\models\Review;
use common\models\Theme;
use common\models\WidgetsSettings;
use Yii;

/**
 * Class LandingContentProvider
 * @package common\managers
 */
class LandingContentProvider
{
    /** @var Company **/
    private $Company;

    /** @var Mainpage **/
    private $MainPageSettings;

    /** @var Review **/
    private $Review;

    /** @var Theme **/
    private $ThemeSettings;

    /**
     * @var WidgetSettingsProvider
     */
    private $WidgetsSettingsProviderManager;

    /**
     * LandingContentProvider constructor.
     * @throws \yii\base\InvalidConfigException
     */
    public function __construct()
    {
        $this->Company = new Company();
        $this->MainPageSettings = new Mainpage();
        $this->Review = new Review();
        $this->ThemeSettings = new Theme();
        // PLEASE use php version 5.6 and just use Yii::createObject(WidgetSettingsProvider::class) !!!!
        $this->WidgetsSettingsProviderManager = new WidgetSettingsProvider(new WidgetSettingsDataMapper(new WidgetsSettings()), new WidgetsNamesHolder());
    }

    /**
     * @return WidgetSettingsProvider|object
     */
    public function getWidgetSettingsProvider()
    {
        return $this->WidgetsSettingsProviderManager;
    }

    /**
     * @return CompanyRatings|object
     * @throws \yii\base\InvalidConfigException
     */
    public function getCompanyRatings()
    {
        $mainPageSettings = $this->MainPageSettings->findOne(["id" => 1]);
        return new CompanyRatings($this->Company, $mainPageSettings);
    }

    /**
     * @return static
     */
    public function getThemeSettings()
    {
        return $this->ThemeSettings->findOne(["id" => 1]);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getReviews()
    {
        return $this->Review->getLast();
    }


}