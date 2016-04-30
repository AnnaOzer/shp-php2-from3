<?php

class News
    extends AbstractModel
{
    static protected $table = "newsarticles";

    public function updateOne($item)
    {
        $sql = "UPDATE " . static::getTableName() .
            " SET title =" . $item['title'] . ", text=" . $item['text'] . ", author=" . $item['author'] .
            " WHERE id=" . $item['id'] . ")";
        $connection = new DbConnection();
        return $connection->query($sql);
    }

    public function insertOne($item)
    {
        $sql = "INSERT INTO " . static::getTableName() . " VALUES (". $item['title'] . ", " . $item['text'] .", " . $item['author'] . ")";
        $connection = new DbConnection();
        return $connection->queryExec($sql);
    }
}