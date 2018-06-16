<?php


namespace common\managers;

use common\data_mappers\ActivityDirectionDataMapper;
use common\models\Company;
use common\models\CompanyRatings;
use common\models\Mainpage;
use common\models\Review;
use common\models\Theme;
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

    /** @var ActivityDirectionDataMapper **/
    private $ActivityDirectionDataMapper;

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
        $this->Company = \Yii::createObject(Company::class);
        $this->MainPageSettings = \Yii::createObject(Mainpage::class);
        $this->Review = Yii::createObject(Review::class);
        $this->ThemeSettings = Yii::createObject(Theme::class);
        $this->ActivityDirectionDataMapper = Yii::createObject(ActivityDirectionDataMapper::class);
        $this->WidgetsSettingsProviderManager = Yii::createObject(WidgetSettingsProvider::class);
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
        return Yii::createObject(CompanyRatings::class, [$this->Company, $mainPageSettings]);
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

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getPopularActivityDirections()
    {
        return $this->ActivityDirectionDataMapper->getReadyToViewActivities();
    }

}