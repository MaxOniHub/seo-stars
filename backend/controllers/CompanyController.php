<?php

namespace backend\controllers;

use backend\models\EntityForm;
use common\data_mappers\CompanyCasesDataMapper;
use common\data_mappers\CompanyReviewsAndThanksDataMapper;
use common\managers\FileUploaderManager;
use common\models\ActivityDirection;
use common\models\CompanyActivities;
use common\models\CompanyCases;
use common\models\CompanyReviewsAndThanks;
use Yii;
use common\models\Company;
use common\models\CompanySearch;
use backend\models\LoadFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\components\Translit;
use yii\helpers\Json;
use common\models\User;
use yii\filters\AccessControl;


/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
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
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Company model.
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
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Company();
        /** @var EntityForm $EntityForm */
        $EntityForm = new EntityForm(new ActivityDirection());

        if ($model->load(Yii::$app->request->post()))
        {
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
            /**
             * Uploading cases
             */
            if ($model->cases = UploadedFile::getInstances($model, 'cases'))
            {
                /** @var FileUploaderManager $FileUploaderManager */
                $FileUploaderManager = new FileUploaderManager();
                /** @var CompanyCasesDataMapper $CompanyCasesDataMapper */
                $CompanyCasesDataMapper = new CompanyCasesDataMapper(Yii::$app->db, new CompanyCases());

                $links = $FileUploaderManager
                    ->setFileNamePattern("case")
                    ->setUid($model->id)
                    ->setTargetDirectory("company-cases")
                    ->bulkUpload($model->cases);

                $CompanyCasesDataMapper->batchInsert($links, $model->id);
            }

            /**
             * Uploading thanks
             */
            if ($model->reviews_and_thanks = UploadedFile::getInstances($model, 'reviews_and_thanks'))
            {
                /** @var FileUploaderManager $FileUploaderManager */
                $FileUploaderManager = new FileUploaderManager();
                /** @var CompanyReviewsAndThanksDataMapper $CompanyCasesDataMapper */
                $CompanyReviewsAndThanksDataMapper = new CompanyReviewsAndThanksDataMapper(Yii::$app->db, new CompanyReviewsAndThanks());

                $links = $FileUploaderManager
                    ->setFileNamePattern("reviews")
                    ->setUid($model->id)
                    ->setTargetDirectory("company-reviews-and-thanks")
                    ->bulkUpload($model->reviews_and_thanks);

                $CompanyReviewsAndThanksDataMapper->batchInsert($links, $model->id);
            }

            if($model->tags)
                $model->tags = implode(", ", $model->tags);
            if($model->regions)
                $model->regions = implode(", ", $model->regions);
            $model->raiting = 0;
            $model->reviews = 0;
            $model->save(); 
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
                'entityForm' => $EntityForm
            ]);
        }
    }

    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\base\Exception
     */
    public function actionUpdate($id)
    {
        /** @var EntityForm $EntityForm */
        $EntityForm = new EntityForm(new ActivityDirection());

        $model = $this->findModel($id);
        $model->tags=explode(", ", $model->tags);
        $model->regions=explode(", ", $model->regions);
        $img=$model->logo;

        /** Init Activities for Company using relation **/
        $model->activities_ids = $model->activities;

        if ($model->load(Yii::$app->request->post()))
        {
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

            /**
             * Uploading cases
             */
            if ($model->cases = UploadedFile::getInstances($model, 'cases'))
            {
                /** @var FileUploaderManager $FileUploaderManager */
                $FileUploaderManager = new FileUploaderManager();
                /** @var CompanyCasesDataMapper $CompanyCasesDataMapper */
                $CompanyCasesDataMapper = new CompanyCasesDataMapper(Yii::$app->db, new CompanyCases());

                $links = $FileUploaderManager
                   ->setFileNamePattern("case")
                   ->setUid($model->id)
                   ->setTargetDirectory("company-cases")
                   ->bulkUpload($model->cases);

                $CompanyCasesDataMapper->batchInsert($links, $model->id);
            }

            /**
             * Uploading thanks
             */
            if ($model->reviews_and_thanks = UploadedFile::getInstances($model, 'reviews_and_thanks'))
            {
                /** @var FileUploaderManager $FileUploaderManager */
                $FileUploaderManager = new FileUploaderManager();
                /** @var CompanyReviewsAndThanksDataMapper $CompanyCasesDataMapper */
                $CompanyReviewsAndThanksDataMapper = new CompanyReviewsAndThanksDataMapper(Yii::$app->db, new CompanyReviewsAndThanks());

                $links = $FileUploaderManager
                    ->setFileNamePattern("reviews")
                    ->setUid($model->id)
                    ->setTargetDirectory("company-reviews-and-thanks")
                    ->bulkUpload($model->reviews_and_thanks);

                $CompanyReviewsAndThanksDataMapper->batchInsert($links, $model->id);
            }

            if($model->tags)
                $model->tags = implode(", ", $model->tags);
            if($model->regions)
                $model->regions = implode(", ", $model->regions);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
                'entityForm' => $EntityForm
            ]);
        }
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        CompanyActivities::deleteAll(["company_id" => $id]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionExcel()
    {
        /*$objPHPExcel = PHPExcel_IOFactory::load("../web/excel/file.xlsx");
        $objPHPExcel->setActiveSheetIndex(0);
        $aSheet = $objPHPExcel->getActiveSheet();
 
    //этот массив будет содержать массивы содержащие в себе значения ячеек каждой строки
    $array = array();
    //получим итератор строки и пройдемся по нему циклом
    foreach($aSheet->getRowIterator() as $row){
      //получим итератор ячеек текущей строки
      $cellIterator = $row->getCellIterator();
      //пройдемся циклом по ячейкам строки
      //этот массив будет содержать значения каждой отдельной строки
      $item = array();
      foreach($cellIterator as $cell){
        //заносим значения ячеек одной строки в отдельный массив
        array_push($item, iconv('utf-8', 'cp1251', $cell->getCalculatedValue()));
      }
      //заносим массив со значениями ячеек отдельной строки в "общий массв строк"
      array_push($array, $item);
    }
        return $array;*/
        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import', 
            'fileName' => '../web/excel/file.xlsx', 
            'setFirstRecordAsKeys' => true, 
        ]);
        print_r($data);

    }
    public function actionNameurl($name)
    {
        echo Json::encode(['alias'=>(new Translit)->str2url($name)]);
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
            foreach($data as $d)
            {
                $company = new Company();
            	$company->name = $d['Название']."";
                $company->alias = $d['name-url']."";
                $company->site = $d['Сайт']."";
                $company->raiting = 0; 
                $company->reviews = 0;
                $company->vk_group = $d['Группа_VK']."";
                $company->fb_group = $d['Группа_Fb']."";
                $company->regions = $d['Регионы'];
                $company->tags = $d['Теги']; 
                $company->year = $d['Год']."";
                $company->seo_title = $d['title']."";
                $company->seo_keys = $d['keywords']."";
                $company->seo_desc = $d['description']."";
                $company->save();
            }
            
            return $this->redirect(['index']);
        }        
        
        return $this->render('load', [
            'model' => $model,
            'arr'=>$arr
        ]);
    }
}
