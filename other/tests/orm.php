<?php

abstract class Model {

    static protected $table;

    static function getConnection()
    {
        $dsn = 'mysql:dbname=shp-php2-2111;host=localhost';
        return new Pdo($dsn, 'root', '');
    }

    static function findAll()
    {

            $sql = 'SELECT * FROM ' . static::$table;
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
            $sth->execute();
            return $sth->fetchAll();

    }
}

class News extends Model
{
    static protected $table = 'newsarticles';
}

try {
    $news = News::findAll();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}

// SQLSTATE[HY000] [1049] Unknown database 'shp-php2-2111'