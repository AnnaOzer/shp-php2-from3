<?php

class News
    extends AbstractModel
{
    static protected $table = "newsarticles";

    public function updateOne($item)
    {
        $sql = "UPDATE " . static::getTableName() .
            " SET title=:title, author=:author, text=:text WHERE id=:id";
        $connection = new DbConnection();
        return $connection->toExecute(
            $sql,
            [':id'=>$item->id, ':title'=>$item->title, ':author'=>$item->author, ':text'=>$item->text]
        );
    }

    public function insertOne($item)
    {
        $sql = "INSERT INTO " . static::getTableName() .
            " (title, author, text) VALUES (:title, :author, :text)";
        $connection = new DbConnection();
        return $connection->toExecute($sql, [':title'=>$item['title'], ':author'=>$item['author'], ':text'=>$item['text']]);
    }

    public function deleteOne($id)
    {
        $sql = "DELETE FROM " . static::getTableName() . " WHERE id=:id";
        $connection = new DbConnection();
        return $connection->toExecute($sql, [':id'=>$id]);
    }
}