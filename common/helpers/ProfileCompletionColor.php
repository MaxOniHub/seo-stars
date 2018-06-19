<?php

namespace common\helpers;

/**
 * Class ProfileCompletionColor
 * @package app\components
 */
class ProfileCompletionColor
{
    const LOW = "#e8fce3";
    const MEDIUM = "#cff7c5";
    const HIGH = "#8ff975";
    const FULL = "#3bd117";

    /**
     * @param $value
     * @return string hex color
     */
    public function getColor($value)
    {
        if ($value <= 40) return self::LOW;

        if ($value > 40 && $value <= 60) return self::MEDIUM;

        if ($value > 60 && $value <= 80) return self::HIGH;

        if ($value == 100) return self::FULL;
    }

}