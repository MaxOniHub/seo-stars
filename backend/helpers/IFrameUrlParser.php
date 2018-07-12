<?php

namespace backend\helpers;

/**
 * Class UrlParser
 * @package backend\helpers
 */
class IFrameUrlParser
{
    /**
     * @param $text
     * @param bool $as_string
     * @return mixed
     */
    public function parse($text, $as_string = false)
    {
        preg_match_all( '@src="([^"]+)"@' , $text, $match );
        $src = array_pop($match);

        return $as_string ? implode(",", $src) : $src;
    }

}