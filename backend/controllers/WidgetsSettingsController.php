<?php
namespace backend\controllers;

use backend\helpers\WidgetsSettingsFactory;
use common\data_mappers\WidgetSettingsDataMapper;
use common\helpers\WidgetsNamesHolder;
use common\interfaces\IWidgetSettings;
use common\models\ActivityDirectionSearch;
use common\models\CountersTopPageWidgetSettings;
use common\models\RegionsWidgetSettings;
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
        $WidgetSettingsDataMapper = new WidgetSettingsDataMapper(new WidgetsSettings());
        /** @var WidgetsSettings $widgetSettings */
        $widgetSettings = $WidgetSettingsDataMapper->findByPrimaryKey($id);
        /** @var WidgetsSettingsFactory $WidgetsSettingsFactory */
        $WidgetsSettingsFactory = new WidgetsSettingsFactory();

        /** @var IWidgetSettings $widget */
        $widget = $WidgetsSettingsFactory->getWidgetSettings($id);
        $widget->initSettings($widgetSettings);

        if ($widget->load(Yii::$app->request->post()))
        {
            $WidgetSettingsDataMapper->load($widget);
            $WidgetSettingsDataMapper->save();
        }

        return $this->render('update', [
            'model' => $widget,
            'view' => $widget->getView()
        ]);

    }


}
