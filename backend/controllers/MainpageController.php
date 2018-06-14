<?php

namespace backend\controllers;

use Yii;
use common\models\Mainpage;
use common\models\MainpageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainpageController implements the CRUD actions for Mainpage model.
 */
class MainpageController extends Controller
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all Mainpage models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        $searchModel = new MainpageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Mainpage model.
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
     * Creates a new Mainpage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new Mainpage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Mainpage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->tags1=explode(", ", $model->tags1);
        $model->regions1=explode(", ", $model->regions1);
        $model->tags2=explode(", ", $model->tags2);
        $model->regions2=explode(", ", $model->regions2);
        $model->tags3=explode(", ", $model->tags3);
        $model->regions3=explode(", ", $model->regions3);
        $model->tags4=explode(", ", $model->tags4);
        $model->regions4=explode(", ", $model->regions4);
        if ($model->load(Yii::$app->request->post())) {
            if($model->tags1)
                $model->tags1 = implode(", ", $model->tags1);
            if($model->regions1)
                $model->regions1 = implode(", ", $model->regions1);
            if($model->tags2)
                $model->tags2 = implode(", ", $model->tags2);
            if($model->regions2)
                $model->regions2 = implode(", ", $model->regions2);
            if($model->tags3)
                $model->tags3 = implode(", ", $model->tags3);
            if($model->regions3)
                $model->regions3 = implode(", ", $model->regions3);
            if($model->tags4)
                $model->tags4 = implode(", ", $model->tags4);
            if($model->regions4)
                $model->regions4 = implode(", ", $model->regions4);
                
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mainpage model.
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
     * Finds the Mainpage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mainpage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mainpage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
