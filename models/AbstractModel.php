<?php

abstract class AbstractModel
{
    static protected $table;

    static function findAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $connection = new DbConnection();
        return $connection->toExecute($sql)->fetchAll();
    }

    static function findByPk($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $connection = new DbConnection();
        return $connection->toExecute($sql, [':id' => $id])->fetch();
    }

}