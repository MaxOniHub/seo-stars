<?php

namespace backend\controllers;

use backend\models\EntityForm;
use common\models\ActivityDirection;
use Yii;
use common\models\Conference;
use common\models\ConferenceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\Translit;
use yii\helpers\Json;
use backend\models\LoadFile;

use backend\components\PHPExcel\Classes\PHPExcel;
use backend\components\PHPExcel\Classes\PHPExcel\PHPExcel_IOFactory;
/**
 * ConferenceController implements the CRUD actions for Conference model.
 */
class ConferenceController extends Controller
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

    /**
     * Lists all Conference models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConferenceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Conference model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Conference model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        $model = new Conference();
        /** @var EntityForm $EntityForm */
        $EntityForm = new EntityForm(new ActivityDirection());

        if ($model->load(Yii::$app->request->post())) {

            /** Save activities directions mapping **/
            if ($model->activities_ids) {
                $model->setRelated('activities', $model->activities_ids, true);
            }


            if(UploadedFile::getInstance($model, 'logo'))
            {
                $model->logo=UploadedFile::getInstance($model, 'logo');
                $model->logo->saveAs('../../frontend/web/mt/img/'.$model->logo->baseName.".".$model->logo->extension);
                $model->logo=$model->logo->baseName.".".$model->logo->extension;   
            }
            if($model->tags)
                $model->tags = implode(", ", $model->tags);
            if($model->regions)
                $model->regions = implode(", ", $model->regions);
            $model->raiting = 0;
            $model->reviews = 0;
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'entityForm' => $EntityForm
            ]);
        }
    }

    /**
     * Updates an existing Conference model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        /** @var EntityForm $EntityForm */
        $EntityForm = new EntityForm(new ActivityDirection());

        $model->tags=explode(", ", $model->tags);
        $model->regions=explode(", ", $model->regions);
        $img=$model->logo;

        /** Init Activities for Company using relation **/
        $model->activities_ids = $model->activities;

        if ($model->load(Yii::$app->request->post())) {
            /** Save activities directions mapping **/
            if ($model->activities_ids) {
                $model->setRelated('activities', $model->activities_ids, true);
            }
            if(UploadedFile::getInstance($model, 'logo'))
            {
                $model->logo=UploadedFile::getInstance($model, 'logo');
                $model->logo->saveAs('../../frontend/web/mt/img/'.$model->logo->baseName.".".$model->logo->extension);
                $model->logo=$model->logo->baseName.".".$model->logo->extension;    
            }
            else
                $model->logo=$img;
                
            if($model->tags)
                $model->tags = implode(", ", $model->tags);
            if($model->regions)
                $model->regions = implode(", ", $model->regions);
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'entityForm' => $EntityForm
            ]);
        }
    }

    /**
     * Deletes an existing Conference model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Conference model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Conference the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Conference::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionLoad()
    {
        $model = new LoadFile();
        $path = '../../backend/web/excel/';
        
        if ($model->load(Yii::$app->request->post()))
        {
            if(UploadedFile::getInstance($model, 'file'))
            {
                $model->file=UploadedFile::getInstance($model, 'file');
                $model->file->saveAs($path.$model->file->baseName.".".$model->file->extension);
                $file=$path.$model->file->baseName.".".$model->file->extension; 
                
            $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import', 
            'fileName' => $file, 
            'setFirstRecordAsKeys' => true, 
            ]); 
            }
            if(isset($data[0])) $data=$data[0];
            foreach($data as $d)
            {
                $conference = new Conference();
            	$conference->name = $d['Название']."";
                $conference->alias = $d['name-url']."";
                $conference->site = $d['Сайт']."";
                $conference->raiting = 0; 
                $conference->reviews = 0;
                $conference->vk_group = $d['Группа_VK']."";
                $conference->fb_group = $d['Группа_Fb']."";
                $conference->regions = $d['Регионы'];
                $conference->tags = $d['Теги']; 
                $conference->seo_title = $d['title']."";
                $conference->seo_keys = $d['keywords']."";
                $conference->seo_desc = $d['description']."";
                $conference->save();
            }
            
            return $this->redirect(['index']);
        }        
        
        return $this->render('load', [
            'model' => $model,
            'arr'=>$arr
        ]);
    }
    
    public function actionNameurl($name)
    {
        echo Json::encode(['alias'=>(new Translit)->str2url($name)]);
    }
}
