<?php
abstract class DataBaseFactory {
    abstract public function getDBConnection();
    abstract public function getDBRecord();
    abstract public function getDBQueryBuilder();
}


/**
 * Клиентский код
*/

function MySqlDataBase (DataBaseFactory $dataBaseFactory)
{
    $connection = $dataBaseFactory->getDBConnection();
    $record = $dataBaseFactory->getDBRecord();
    $querybuilder = $dataBaseFactory->getDBQueryBuilder();

    echo $connection->getConnect();
    echo $record->getRecord();
    echo $querybuilder->getQueryBuilder();
}


 MySqlDataBase(new MySqlFactory());
