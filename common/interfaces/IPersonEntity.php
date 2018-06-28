<?php

namespace common\interfaces;

interface IPersonEntity extends IBasicEntity
{
    public function getCompanyName();

    public function getServiceName();
}