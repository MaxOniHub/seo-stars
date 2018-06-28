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
        if ($this->canUpdateRating()) {
            $updated_rating = $this->calculateRating();
            $this->owner->updateAttributes(["raiting" => $updated_rating]);
        }
    }

    private function canUpdateRating()
    {
        /** @var ActiveRecord $owner */
        $owner = $this->owner;
        $old_attr = $owner->getOldAttributes();

        if ($old_attr["about"] != $owner->about || $old_attr["clients"] != $owner->clients ||
            count($this->owner->reviews_and_thanks) > 0 || count($this->owner->cases) > 0) {
            return true;
        }

        return false;

    }

    private function calculateRating()
    {

        return (new ProfileRatingCounter($this->owner->profile_complete_status, $this->owner->raiting,   $this->owner->multiplier, $this->owner->reviews))->calculate();
    }

}