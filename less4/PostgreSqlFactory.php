<?php

class PostgreSqlFactory extends DataBaseFactory
{
    public function getDBConnection()
    {
        return new PostgreSqlConnection();   // TODO: Implement getDBConnection() method.
    }
    public function getDBRecord()
    {
        return new PostgreSqlRecord();   // TODO: Implement getDBRecord() method.
    }
    public function getDBQueryBuilder()
    {
        return new PostgreSqlQueryBuilder();   // TODO: Implement getDBQueryBuilder() method.
    }
}