<?php

abstract class AbstractModel
{
    static protected $table;

    static public function getTableName() {
        return static::$table;
    }
}