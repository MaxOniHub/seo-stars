<?php

namespace backend\helpers;

class YouTubeLinkParser
{

    public function getVideoIDFromEmbedUrl($url)
    {
        $parsed_url = parse_url($url);

        return end(explode("/", $parsed_url['path']));
    }

}