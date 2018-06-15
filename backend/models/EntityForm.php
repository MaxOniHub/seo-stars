<?php

namespace backend\models;

use common\models\ActivityDirection;

/**
 * Class CompanyForm
 * @package backend\models
 */
class EntityForm
{

    /**
     * @var ActivityDirection
     */
    private $ActivityDirection;

    /**
     * CompanyForm constructor.
     * @param ActivityDirection $activityDirection
     */
    public function __construct(ActivityDirection $activityDirection)
    {
        $this->ActivityDirection = $activityDirection;
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getActivities()
    {
        return $this->ActivityDirection->find()->asArray()->all();
    }

}