<?php

namespace common\data_mappers;

use common\models\CompanyCases;
use yii\db\Connection;
use yii\db\Exception;

/**
 * Class CompanyCasesDataMapper
 * @package common\data_mappers
 */
class CompanyCasesDataMapper
{
    /**
     * @var CompanyCases
     */
    private $repository;

    /**
     * @var Connection
     */
    private $connection;

    /**
     * CompanyCasesDataMapper constructor.
     * @param CompanyCases $companyCases
     * @param Connection $connection
     */
    public function __construct(Connection $connection, CompanyCases $companyCases)
    {
        $this->repository = $companyCases;
        $this->connection = $connection;
    }

    /**
     * @param array $data
     * @param $related_entity_id
     * @return bool
     * @throws Exception
     */
    public function batchInsert($data = [], $related_entity_id)
    {
        $transaction = $this->connection->beginTransaction(); // keep current transaction
        try {
            $this->connection->createCommand()->batchInsert($this->repository->tableName(),
                ['company_id', 'origin_path', 'thumbnail_path'],
                $this->prepareData($data, $related_entity_id)
            )->execute();
            $transaction->commit(); // apply transaction
            return true;
        } catch (Exception $e) {
            $transaction->rollBack(); // roll back transaction
            return false;
        }

    }

    private function prepareData($data, $related_entity_id)
    {
        $insert = [];

        foreach ($data as $key => $item) {
            $insert[] = [$related_entity_id, $item['origin'], $item['thumbnail']];
        }

        return $insert;
    }

}