<?php

namespace backend\behaviors;

use backend\helpers\ProfileRatingCounter;
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
        $updated_rating = $this->calculateRating();
        $this->owner->updateAttributes(["mod_rating" => $updated_rating]);
    }

    private function calculateRating()
    {
        $options = [
            'profile_completion' => $this->owner->profile_complete_status,
            'multiplier' => $this->owner->multiplier,
            'base_rating' => $this->owner->raiting,
        ];
        return (new ProfileRatingCounter($options))->calculate();
    }

}