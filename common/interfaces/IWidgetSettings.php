<?php


namespace common\interfaces;

interface IWidgetSettings
{
    public function initSettings($options);

    public function getSettings();

    public function getKey();

    public function getTitle();

    public function getView();
}