<?php

namespace common\helpers;

/**
 * Class ProfileCompletionColor
 * @package app\components
 */
class ProfileCompletionColor
{
    const LOW = "#ddfeed";
    const MEDIUM = "#ddfeed";
    const HIGH = "#abfdd3";
    const FULL = "#72e8ac";

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