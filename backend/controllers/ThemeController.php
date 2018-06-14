<?php

namespace backend\controllers;

use Yii;
use common\models\Theme;
use common\models\ThemeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use common\models\User;
use yii\filters\AccessControl;
/**
 * ThemeController implements the CRUD actions for Theme model.
 */
class ThemeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            if(User::isUserAdmin(Yii::$app->user->identity->username))
                                return true;
                            else
                                return  $this->redirect(['../../main/index']);
                       }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Theme models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new ThemeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Theme model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        return $this->render('view', [
            'model' => $this->findModel(1),
        ]);
    }

    /**
     * Creates a new Theme model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Theme();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Theme model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img1=$model->logo_big;
        $img2=$model->logo_small;

        if ($model->load(Yii::$app->request->post())) {
            if(UploadedFile::getInstance($model, 'logo_big'))
            {
                $model->logo_big=UploadedFile::getInstance($model, 'logo_big');
                $model->logo_big->saveAs('../../frontend/web/mt/img/'.$model->logo_big->baseName.".".$model->logo_big->extension);
                $model->logo_big=$model->logo_big->baseName.".".$model->logo_big->extension;
            }
            else
                $model->logo_big=$img1;
            if(UploadedFile::getInstance($model, 'logo_small'))
            {
                $model->logo_small=UploadedFile::getInstance($model, 'logo_small');
                $model->logo_small->saveAs('../../frontend/web/mt/img/'.$model->logo_small->baseName.".".$model->logo_small->extension);
                $model->logo_small=$model->logo_small->baseName.".".$model->logo_small->extension;
            }
            else
                $model->logo_small=$img2;
            
            $model->save();
            return $this->redirect(['view']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Theme model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Theme model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Theme the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Theme::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
