<?php
namespace backend\controllers;

use common\data_mappers\WidgetSettingsDataMapper;
use common\models\ActivityDirectionSearch;
use common\models\CountersTopPageSettings;
use common\models\WidgetsSettings;
use common\models\WidgetsSettingsSearch;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * WidgetsSettingsController
 */
class WidgetsSettingsController extends Controller
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


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new WidgetsSettingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        /** @var WidgetSettingsDataMapper $WidgetSettingsDataMapper */
        $WidgetSettingsDataMapper = Yii::createObject(WidgetSettingsDataMapper::class);
        /** @var CountersTopPageSettings $counterTopPage */
        $counterTopPage = Yii::createObject(CountersTopPageSettings::class);
        /** @var WidgetsSettings $widgetSettings */
        $widgetSettings = $WidgetSettingsDataMapper->findByPrimaryKey($id);
        $counterTopPage->initSettings($widgetSettings);

        if ($counterTopPage->load(Yii::$app->request->post()))
        {
            $WidgetSettingsDataMapper->load($counterTopPage);
            $WidgetSettingsDataMapper->save();
        }

        return $this->render('update', [
            'model' => $counterTopPage,
        ]);

    }


}
