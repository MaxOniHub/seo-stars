<?php

namespace frontend\components;

/**
 * Class FirstWidget
 * @package app\components
 */
class YoutubeCarouselWidget extends CustomCarouselWidget
{
    public function run()
    {
        if ($this->items)
            return $this->render('youtube-carousel-widget/view', ["items" => $this->items]);
    }


}