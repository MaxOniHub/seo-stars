<?php

namespace common\interfaces;

interface IImageModifier
{
    public function makeThumbnail($from_file, $to_file, $options = ["width" => null, "height" => null, "quality" => 100]);
}