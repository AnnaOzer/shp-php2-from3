<?php

class ModelException extends Exception {}

abstract class Model {

    static protected $table;

    static protected $columns = [];

    static function getConnection()
    {
        $dsn = 'mysql:dbname=shp-php2-2;host=localhost';
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

    public $isNew = true;

    public function save()
    {
        $tokens = [];
        $values = [];
        foreach (static::$columns as $column) {
            $tokens[] = ':' . $column;
            $values[] = $this->$column;
        }

        if($this->isNew) {
            $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', static::$columns) . ')
            VALUES
            (' . implode(',' $tokens)')';
        }
    }
}

class News extends Model
{
    static protected $table = 'newsarticles';
    static protected $columns = ['title', 'author', 'text'];
}

$article = new News;
$article->title = 'Новая новость';
$article->text = 'Её текст';
$article->save();

var_dump($article->id);