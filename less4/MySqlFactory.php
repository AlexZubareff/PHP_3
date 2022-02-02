<?php


class MySqlFactory extends DataBaseFactory
{
    public function getDBConnection()
    {
        return new MySqlConnection();   // TODO: Implement getDBConnection() method.
    }
    public function getDBRecord()
    {
        return new MySqlRecord();   // TODO: Implement getDBRecord() method.
    }
    public function getDBQueryBuilder()
    {
        return new MySqlQueryBuilder();   // TODO: Implement getDBQueryBuilder() method.
    }
}
