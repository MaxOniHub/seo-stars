<?php

namespace common\data_mappers;

use common\models\Company;

/**
 * Class CompanyDataMapper
 * @package common\data_mappers
 */
class CompanyDataMapper
{
    private $repository;

    public function __construct(Company $company)
    {
        $this->repository = $company;
    }

    public function getAll()
    {
        return $this->basicQuery()->orderBy([ 'mod_rating' => SORT_DESC])->asArray()->all();
    }

    public function getCompaniesByActivity($activity_alias)
    {
        return $this->basicQuery()->where(["activity_direction.alias" => $activity_alias])->orderBy(['mod_rating' => SORT_DESC])->asArray()->all();
    }

    private function basicQuery()
    {
        return $this->repository->find()->joinWith($this->getRelations());
    }

    private function getRelations()
    {
        return ["casesFiles", "activities"];
    }
}