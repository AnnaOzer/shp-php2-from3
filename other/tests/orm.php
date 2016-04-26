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

        $sth = $dbh->prepare("SELECT * FROM newsarticles WHERE id=:id");

        $sth->execute([':id' => 1]);

        $data = $sth->fetchAll(PDO::FETCH_CLASS);
        var_dump($data);
    }
}

class News extends Model
{
    static protected $table = 'news';
}


$model = new News();