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

    static function findByPk($id)
    {

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $dbh = static::getConnection();
        $sth = $dbh->prepare($sql);
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        $sth->execute([':id'=>$id]);
        return $sth->fetch();

    }

    public function save()
    {
        $tokens = [];
        $values = [];
        foreach (static::$columns as $column) {
            $tokens[] = ':' . $column;
            $values[':' . $column] = $this->$column;
        }

        if(!isset($this->id)) {

            $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', static::$columns) . ')
             VALUES
            (' . implode(', ', $tokens). ')';
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->execute($values);
            $this->id = $dbh->lastInsertId();

        } else {

            $columns = [];
            foreach (static::$columns as $column) {
                $columns[] = $column . '=:' . $column;
            }
            $sql = 'UPDATE ' . static::$table . '
            SET ' . implode(',' , $columns) . '
            WHERE id=:id
            ';
            $dbh = static::getConnection();
            $sth = $dbh->prepare($sql);
            $sth->execute([':id' =>$this->id] + $values); // массивы в php можно складывать
        }
    }
}

class News extends Model
{
    static protected $table = 'newsarticles';
    static protected $columns = ['title', 'author', 'text'];
}

$article = News::findByPk(21);
$article->title = 'СУПЕР НОВОСТЬ!!!';
$article->save();

var_dump($article);