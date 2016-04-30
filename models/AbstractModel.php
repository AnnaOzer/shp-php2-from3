<?php

abstract class AbstractModel
{
    static protected $table;

    static function getTableName()
    {
        return static::$table;
    }

    static function findAll()
    {
        $sql = "SELECT * FROM " . static::getTableName();
        $connection = new DbConnection();
        return $connection->query($sql);
    }

    static function findByPk($id)
    {
        $sql = "SELECT * FROM " . static::getTableName();
        $connection = new DbConnection();
        return $connection->queryOne($sql, [':id' => $id]);
    }

}