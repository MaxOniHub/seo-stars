<?php

namespace backend\helpers;

/**
 * Class ProfileRatingCounter
 * @package backend\helpers
 */
class ProfileRatingCounter
{

    private $profile_completion;

    private $rating;

    private $multiplier;

    private $reviews;

    /**
     * ProfileRatingCounter constructor.
     * @param integer $profile_completion
     * @param integer $rating
     * @param float $multiplier
     * @param $reviews
     */
    public function __construct($profile_completion, $rating, $multiplier, $reviews)
    {
        $this->profile_completion = $profile_completion;
        $this->rating = $rating;
        $this->multiplier = $multiplier;
        $this->reviews = $reviews;
    }

    public function calculate()
    {
        /** get percents */
        $this->profile_completion *= 0.01;

        if ($this->profile_completion == 1) {
            $this->rating += $this->profile_completion;
        } else {
            /** Rating based on profile completion */
            $this->rating *= $this->profile_completion;
        }

        if ($this->rating == 0) {
            $this->rating = round($this->profile_completion);
        }

        return round($this->rating * $this->multiplier, 0, PHP_ROUND_HALF_UP);
    }
}