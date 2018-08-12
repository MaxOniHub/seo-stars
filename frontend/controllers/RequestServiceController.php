<?php

namespace frontend\controllers;

use common\managers\RequestServiceAdminNotification;
use common\managers\RequestServiceManager;
use common\models\Pages;
use common\models\RequestService;
use common\models\RequestServiceForm;
use yii\web\Controller;

/**
 * Class RequestServiceController
 * @package frontend\controllers
 */
class RequestServiceController extends Controller
{
    public $layout = "common";

    /**
     * @var Pages
     */
    private $pageSettings;

    /**
     * @var RequestServiceForm
     */
    private $requestServiceForm;

    public function init()
    {
        parent::init();
        $this->pageSettings = Pages::find()->where(['alias' => 'service-request'])->one();
        $this->requestServiceForm = new RequestServiceForm();
    }

    public function actionRequest()
    {
        /** @var RequestServiceAdminNotification $notification */
        $notification = new RequestServiceAdminNotification(\Yii::$app->mailer);

        $success_request = false;
        /** @var RequestServiceManager $requestServiceManager */
        $requestServiceManager = new RequestServiceManager(new RequestService(), \Yii::$app->request);
        $data = \Yii::$app->request->post($this->requestServiceForm->formName());

        if ($requestServiceManager->load($data)) {
            if ($requestServiceManager->save()) {
                $success_request = true;
                $notification
                    ->setRequestInfo($requestServiceManager->getRepository())
                    ->send();
            }
        }

        return $this->render("request_form", [
            'page' => $this->pageSettings,
            'model' => $this->requestServiceForm,
            'success_request' => $success_request
        ]);
    }
}
