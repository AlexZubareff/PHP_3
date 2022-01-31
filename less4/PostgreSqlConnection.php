<?php

class PostgreSqlConnection implements ConnectInterface
{
    public function getConnect()
    {
        return "getConnection for PostgreSql";
    }

}