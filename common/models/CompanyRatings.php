<?php

namespace common\models;

class CompanyRatings
{
    private $repository;

    private $settings;

    public function __construct(Company $company, Mainpage $mainpage)
    {
        $this->repository = $company;
        $this->settings = $mainpage;
    }

    /**
     * @return Mainpage
     */
    public function getSettings()
    {
        return $this->settings;
    }

    public function getTopInUkraine()
    {
        return $this->repository->getTableMain($this->settings->regions4, $this->settings->tags4, $this->settings->limit4, $this->settings->sort4);
    }

    public function getTopInRussia()
    {
        return $this->repository->getTableMain($this->settings->regions3, $this->settings->tags3, $this->settings->limit3, $this->settings->sort3);
    }

    public function getTopTeachingSEO()
    {
       return $this->repository->findBestEDCompanies();
    }

    public function getTopSEO()
    {
        return $this->repository->findBestCompanies();
    }
}