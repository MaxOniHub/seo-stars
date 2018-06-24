<?php

namespace common\helpers;

/**
 * Class ProfileCompletionColor
 * @package app\components
 */
class ProfileCompletionColor
{
    const LOW = "#ddfeed";
    const LOW_CLASS = "stage-little";

    const MEDIUM = "#ddfeed";
    const MEDIUM_CLASS = "stage-medium";

    const HIGH = "#abfdd3";
    const HIGH_CLASS = "stage-many";

    const FULL = "#72e8ac";
    const FULL_CLASS = "stage-full";

    /**
     * @param $value
     * @return string hex color
     */
    public function getColor($value)
    {
        if ($this->isLow($value)) return self::LOW;

        if ($this->isMedium($value)) return self::MEDIUM;

        if ($this->isHigh($value)) return self::HIGH;

        if ($this->isFull($value)) return self::FULL;
    }

    public function getClass($value)
    {
        if ($this->isLow($value)) return self::LOW_CLASS;

        if ($this->isMedium($value)) return self::MEDIUM_CLASS;

        if ($this->isHigh($value)) return self::HIGH_CLASS;

        if ($this->isFull($value)) return self::FULL_CLASS;
    }

    private function isLow($value)
    {
        return $value <= 40;
    }

    private function isMedium($value)
    {
        return $value > 40 && $value <= 60;
    }

    private function isHigh($value)
    {
        return $value > 60 && $value <= 80;
    }

    private function isFull($value)
    {
        return $value == 100;
    }


}