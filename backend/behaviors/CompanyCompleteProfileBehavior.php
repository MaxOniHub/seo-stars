<?php

namespace backend\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * Class CompanyCompleteProfileBehavior
 * @package backend\behaviors
 */
class CompanyCompleteProfileBehavior extends AttributeBehavior
{

    const START_VALUE = 40;

    private $profile_complete_counter = self::START_VALUE;

    private $step = 20;

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave'
        ];
    }

    public function beforeSave($event)
    {

        $this->checkProfileComplete();

        $this->owner->updateAttributes(["profile_complete_status" => $this->getCounter()]);
    }


    public function checkProfileComplete()
    {
        $this->isFilledCasesReviews();
        $this->isFilledClients();
        $this->isFilledAboutCompany();
    }

    public function getCounter()
    {
        return $this->profile_complete_counter;
    }

    public function increaseCounter($value)
    {
        $this->profile_complete_counter += $value;
    }

    public function decreaseCounter($value)
    {
        $this->profile_complete_counter -= $value;
        if ($this->profile_complete_counter < self::START_VALUE) {
            $this->profile_complete_counter = self::START_VALUE;
        }
    }

    public function isFilledCasesReviews()
    {
        if (count($this->owner->casesFiles) > 0 || count($this->owner->reviewsAndThanksFiles) > 0) {
            $this->increaseCounter($this->step);
        } else {
            $this->decreaseCounter($this->step);
        }
    }

    public function isFilledClients()
    {
        if (!empty($this->owner->clients)) {
            $this->increaseCounter($this->step);
        }
    }

    public function isFilledAboutCompany()
    {
        if (!empty($this->owner->about)) {
            $this->increaseCounter($this->step);
        }
    }

}