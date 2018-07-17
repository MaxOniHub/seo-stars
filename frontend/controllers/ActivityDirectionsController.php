<?php

namespace frontend\controllers;

use common\data_mappers\ActivityDirectionDataMapper;
use common\data_mappers\CompanyDataMapper;
use common\models\Company;
use Yii;
use common\models\ActivityDirection;
use common\models\ActivityDirectionSearch;
use yii\base\InvalidConfigException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActivityDirectionsController implements the CRUD actions for ActivityDirection model.
 */
class ActivityDirectionsController extends Controller
{
    public $layout = "common";

    public function actionGetByType($slug)
    {
        /** @var CompanyDataMapper $companyDataMapper */
        $companyDataMapper = new CompanyDataMapper(new Company());
        /** @var ActivityDirectionDataMapper $activityDirections */
        $activityDirections = new ActivityDirectionDataMapper(new ActivityDirection());

        /** @var ActivityDirection $activity */
        $activity = $activityDirections->getByAlias($slug);

        $result = $companyDataMapper->getCompaniesByActivity($slug);

        return $this->render("index",
            [
                "items" => $result,
                "activity" => $activity
            ]
        );
    }
}
