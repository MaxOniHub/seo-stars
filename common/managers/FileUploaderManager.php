<?php

namespace common\managers;

use common\interfaces\IFileUploader;
use Intervention\Image\ImageManagerStatic as Image;
use yii\helpers\BaseFileHelper;
use yii\web\UploadedFile;

/**
 * Class FileUploaderManager
 * @package common\managers
 */
class FileUploaderManager implements IFileUploader
{
    private $width = 320;

    private $height = 240;

    private $quality = 100;

    private $target_dir_path = "../../frontend/web/uploads/";

    private $uid;

    private $file_name_pattern;

    /**
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param integer $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param integer $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return integer
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param integer $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    /**
     * @param string $pattern
     * @return FileUploaderManager
     */
    public function setFileNamePattern($pattern)
    {
        $this->file_name_pattern = $pattern;
        return $this;
    }

    /**
     * @param string $dir_path
     * @return FileUploaderManager
     */
    public function setTargetDirectory($dir_path)
    {
        $this->target_dir_path .= $dir_path;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetDirectory()
    {
        if ($this->uid)
        {
            return $this->target_dir_path . "/" . $this->uid;
        }
        return $this->target_dir_path;
    }

    /**
     * @param $uid
     * @return FileUploaderManager
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    public function upload($file)
    {

    }

    /**
     * @param UploadedFile[] $files
     * @return array
     * @throws \yii\base\Exception
     */
    public function bulkUpload($files = [])
    {
        $links = [];

        foreach ($files as $key => $file) {
            $path_origin = $this->getTargetDirectory();
            $path_thumb = $this->getTargetDirectory() . '/thumbnail';

            BaseFileHelper::createDirectory($path_origin);
            BaseFileHelper::createDirectory($path_thumb);

            $link_to_origin = $path_origin . '/' . $this->getFileName('', time(), $file->extension);
            $link_to_thumb = $path_thumb . '/' . $this->getFileName('', '-small' . time(), $file->extension);

            $file->saveAs($link_to_origin);

            $this->makeThumbnail($link_to_origin, $link_to_thumb, ["width" => $this->width, "height" => $this->height, "quality" => $this->quality]);

            $links [] = ["origin" => $link_to_origin, "thumbnail" => $link_to_thumb];
        }
        return $links;
    }

    /**
     * @param $from_file
     * @param $to_file
     * @param array $options
     */
    public function makeThumbnail($from_file, $to_file, $options = ["width" => null, "height" => null, "quality" => 100])
    {
        try {
            Image::make($from_file)->fit($options["width"], $options["height"])
                ->save($to_file);
        } catch (\Exception $e) {

        }
    }

    /**
     * @param string $suffix
     * @param string $prefix
     * @param $extension
     * @return string
     */
    private function getFileName($prefix = '', $suffix = '', $extension)
    {
        return $prefix . $this->file_name_pattern . $suffix . "." . $extension;
    }


}