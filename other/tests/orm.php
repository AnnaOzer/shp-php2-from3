<?php

abstract class Model {

    static protected $table;

    static function getConnection()
    {
        // это упрощение, вообще здесь надо использовать config
        $dsn = 'mysql:dbname=shp-php2-2;host=localhost';
        return new Pdo($dsn, 'root', '');
    }

    static function findAll()
    {
        $sql = 'SELECT * FROM ' . static::$table;
        $dbh = static::getConnection();
        $sth = $dbh->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'News');
        $sth->execute();
        return $sth->fetchAll();

    }
}

class News extends Model
{
    static protected $table = 'newsarticles';
}

var_dump(
    News::findAll()
);