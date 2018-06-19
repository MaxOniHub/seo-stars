<?php

namespace backend\behaviors;

use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * Class CompanyCompleteProfileBehavior
 * @package backend\behaviors
 */
class CompanyRatingModifierBehavior extends AttributeBehavior
{

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave'
        ];
    }

    public function beforeSave($event)
    {
      //  $this->calculateRating();

        $this->owner->updateAttributes(["raiting" => $this->getRating()]);
    }

    private function getRating()
    {
        return $this->owner->raiting;
    }

    private function calculateRating()
    {
        $this->owner->raiting *= $this->owner->profile_complete_status * 0.01;
    }

}