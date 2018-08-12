<?php

namespace common\managers;
use common\models\RequestService;
use yii\web\Request;

/**
 * Class RequestServiceManager
 * @package common\managers
 */
class RequestServiceManager
{
    protected $repository;

    /** @var Request **/
    private $request;
    /**
     * RequestServiceManager constructor.
     * @param RequestService $requestService
     */
    public function __construct(RequestService $requestService, Request $request)
    {
        $this->repository = $requestService;
        $this->request = $request;
    }

    /**
     * @return RequestService
     */
    public function getRepository()
    {
        return $this->repository;
    }

    public function load($request_data)
    {
        if ($model = $this->fidByUserIP($this->request->getUserIP()))
        {
            $this->repository = $model;
        }
        return $this->repository->load($request_data, '') && $this->repository->validate();
    }

    public function save()
    {
        $this->repository->setUserIP($this->request->getUserIP());
        return $this->repository->save();
    }

    /**
     * @param $ip
     * @return array|null|\yii\db\ActiveRecord
     */
    public function fidByUserIP($ip)
    {
        return $this->repository->find()->where(['ip' => $ip])->one();
    }
}