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
        return $connection->toExecute($sql)->fetchAll();
    }

    static function findByPk($id)
    {
        $sql = "SELECT * FROM " . static::getTableName() . " WHERE id=:id";
        $connection = new DbConnection();
        return $connection->toExecute($sql, [':id' => $id])->fetch();
    }

}