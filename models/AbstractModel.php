<?php

abstract class AbstractModel
{
    static protected $table;
    static protected $columns = [];

    static function findAll()
    {
        $sql = "SELECT * FROM " . static::$table;
        $connection = new DbConnection();
        return $connection->query($sql)->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }

    static function findByPk($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        $connection = new DbConnection();
        $sth = $connection->query($sql, [':id' => $id]);
        $sth->setFetchMode(PDO::FETCH_CLASS, get_called_class());
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

        $connection = new DbConnection();

        if(!isset($this->id)) {

            $sql = 'INSERT INTO ' . static::$table . '
            (' . implode(', ', static::$columns) . ')
             VALUES
            (' . implode(', ', $tokens). ')';
            $connection->query($sql, $values);
            $this->id = $connection->pdo()->lastInsertId();

        } else {

            $columns = [];
            foreach (static::$columns as $column) {
                $columns[] = $column . '=:' . $column;
            }
            $sql = 'UPDATE ' . static::$table . '
            SET ' . implode(',' , $columns) . '
            WHERE id=:id
            ';
            $connection->query($sql, [':id' =>$this->id] + $values);

        }
    }

    public function deleteOne()
    {
        $connection = new DbConnection();

        if(!isset($this->id)) {

            throw new Exception('Попытка удалить несуществующую запись');

        } else {
            $id= $this->id;

            $sql = 'DELETE FROM ' . static::$table . '
                   WHERE id=:id
            ';
            $connection->query($sql, [':id'=>$id]);
        }
    }


}

