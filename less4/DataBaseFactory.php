<?php
abstract class DataBaseFactory {
    abstract public function getDBConnection();
    abstract public function getDBRecord();
    abstract public function getDBQueryBuilder();
}


