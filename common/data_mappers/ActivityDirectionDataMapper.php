<?php

namespace common\data_mappers;

use common\models\ActivityDirection;
use yii\db\ActiveRecord;

/**
 * Class ActivityDirectionDataMapper
 * @package common\data_mappers
 */
class ActivityDirectionDataMapper
{
    /**
     * @var ActiveRecord
     */
    private $repository;

    /**
     * ActivityDirectionDataMapper constructor.
     * @param ActivityDirection $activityDirection
     */
    public function __construct(ActivityDirection $activityDirection)
    {
        $this->repository = $activityDirection;
    }

    public function getByAlias($alias)
    {
        return $this->repository->find()->where(["alias" => $alias])->one();
    }

    /**
     * @return ActivityDirection|ActiveRecord
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getAll()
    {
        return $this->repository->find()->asArray()->all();
    }

    public function initReadyToViewActivities()
    {
        $res = $this->repository->find()->select("id")->where(["is_visible"=>1])->asArray()->column();
        $this->repository->activities_ids = $res;
    }

    public function getReadyToViewActivities()
    {
        return $this->repository->find()->where(["is_visible" => 1])->asArray()->all();
    }

    public function updateVisibility($formData, $is_visible = true)
    {
        if ($this->repository->load($formData)) {
            if ($is_visible) {
                $this->repository->updateAll(["is_visible" => 0]);
            }
            $this->repository->updateAll(["is_visible" => $is_visible], ["id" => $this->repository->activities_ids]);
        }
    }

    public function update($ids = [], $attribute, $value)
    {
        $this->repository->updateAll([$attribute => $value], ["id" => $ids]);
    }

}