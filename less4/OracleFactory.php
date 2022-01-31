<?php

class OracleFactory extends DataBaseFactory
{
    public function getDBConnection()
    {
        return new OracleConnection();   // TODO: Implement getDBConnection() method.
    }
    public function getDBRecord()
    {
        return new OracleRecord();   // TODO: Implement getDBRecord() method.
    }
    public function getDBQueryBuilder()
    {
        return new OracleQueryBuilder();   // TODO: Implement getDBQueryBuilder() method.
    }
}