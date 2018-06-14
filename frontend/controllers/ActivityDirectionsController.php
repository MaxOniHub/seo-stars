<?php

namespace frontend\controllers;

use common\data_mappers\ActivityDirectionDataMapper;
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

    public $layout = "layout";

    public function actionGetByType($slug)
    {
       return $this->render("index");
    }
}
