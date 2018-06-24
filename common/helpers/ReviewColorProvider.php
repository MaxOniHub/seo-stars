<?php

namespace common\helpers;

/**
 * Class ReviewColorProvider
 * @package common\helpers
 */
class ReviewColorProvider
{
    const LOW = "colored-pink";

    const MEDIUM = "colored-blue";

    const EXCELLENT = "colored-green";

    public function getColoredClass($stars)
    {
        if ($stars <= 2) return self::LOW;

        if ($stars == 3) return self::MEDIUM;

        return self::EXCELLENT;
    }
}