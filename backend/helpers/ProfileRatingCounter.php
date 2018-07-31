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

    private $rating;

    private $mod_rating;

    /**
     * ProfileRatingCounter constructor.
     * @param array $options
     */
    public function __construct($options = ['profile_completion' => 0, 'multiplier' => 0, 'base_rating' => 0])
    {
        $this->profile_completion = $options['profile_completion'];
        $this->multiplier = $options['multiplier'];
        $this->rating = $options['base_rating'];

    }

    public function calculate()
    {
        /** get percents */
        $this->profile_completion *= 0.01;

        if ($this->rating == 0) {
            $this->rating = round($this->profile_completion);
        }

        $this->mod_rating = $this->rating * $this->profile_completion * $this->multiplier;

        return round($this->mod_rating, 0, PHP_ROUND_HALF_UP);
    }
}