<?php

abstract class Model {

    static protected $table='123';

    static function getTableName()
    {
         return self::$table;
    }
}

class News extends Model
{
    static public $table = 'news';
}

echo News::getTableName();
echo News::$table;
