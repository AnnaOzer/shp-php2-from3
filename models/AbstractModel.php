<?php

abstract class AbstractModel
{
    static protected $table;
    static protected $columns = [];

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

    public function save()
    {
        $tokens = [];
        $values = [];
        foreach (static::$columns as $column) {
            $tokens[] = ':' . $column;
            $values[':' . $column] = $this->$column;
        }

        $dbh = static::getConnection();

        if(!isset($this->id)) {

            $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', static::$columns) . ')
             VALUES
            (' . implode(', ', $tokens). ')';
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
            $sth = $dbh->prepare($sql);
            $sth->execute([':id' =>$this->id] + $values); // массивы в php можно складывать
        }
    }
}