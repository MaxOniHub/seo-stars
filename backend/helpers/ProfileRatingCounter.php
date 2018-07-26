<?php

namespace backend\helpers;

/**
 * Class ProfileRatingCounter
 * @package backend\helpers
 */
class ProfileRatingCounter
{
    private $profile_completion;

    private $multiplier;

    private $votes;

    /**
     * ProfileRatingCounter constructor.
     * @param integer $profile_completion
     * @param float $multiplier
     * @param $votes
     */
    public function __construct($profile_completion, $multiplier, $votes)
    {
        $this->profile_completion = $profile_completion;
        $this->multiplier = $multiplier;
        $this->votes = $votes;
    }

    public function calculate()
    {
        /** get percents */
        $this->profile_completion *= 0.01;

        $rating = $this->votes;

        /** Rating based on profile completion */
        $rating *= $this->profile_completion;

        if ($rating == 0) {
            $rating = round($this->profile_completion);
        }

        return round($rating * $this->multiplier, 0, PHP_ROUND_HALF_UP);
    }
}