<?php

namespace backend\controllers;

use common\components\Translit;

use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * ActivityDirectionsController implements the CRUD actions for ActivityDirection model.
 */
class SlugTranslatorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionGetSlug($slug)
    {
        echo Json::encode(['alias' => (new Translit)->str2url($slug)]);
    }
}
