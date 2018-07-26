<?php

namespace common\helpers;

/**
 * Class ValueChecker
 * @package common\helpers
 */
class ValueChecker
{
    /**
     * @param $value
     * @param string $default_value
     * @return string
     */
    public static function checkValue($value, $default_value = "-")
    {
        return empty($value) || !isset($value) ? $default_value : $value;
    }
}