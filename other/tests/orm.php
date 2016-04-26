<?php

abstract class Model {

    static protected $table='123';

    static function getTableName()
    {
         return static::$table;
    }

    static function getConnection()
    {
        // это упрощение, вообще здесь надо использовать config
        $dsn = 'mysql:dbname=shp-php2-2;host=localhost';
        return new Pdo($dsn, 'root', '');
    }

}

class News extends Model
{
    static protected $table = 'news';
}

