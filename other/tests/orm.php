<?php

abstract class Model {

    static protected $table='123';

    static function getTableName()
    {
         return static::$table;
    }

    public function __construct()
    {
        $dsn = 'mysql:dbname=shp-php2-2;host=localhost';
        $dbh = new Pdo($dsn, 'root', '');

        $sth = $dbh->prepare("SELECT * FROM newsarticles");

        $sth->execute();

        $data = $sth->fetchAll();
        var_dump($data);
    }
}

class News extends Model
{
    static protected $table = 'news';
}


$model = new News();