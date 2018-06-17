<?php

namespace common\interfaces;

interface IFileUploader extends IImageModifier
{
    public function upload($file);

    public function bulkUpload($files = []);

    public function setTargetDirectory($dir_path);

    public function setUid($uid);
}