<?php

require_once __DIR__ . '/../functions/DbConnect.php';

abstract class Article
{
    public $title;
    public $text;

    public $db;

    public function __construct()
    {
        $this->db = new DbConnect();
    }

    abstract public function getOne($id);

    abstract public function insertOne($item);

    abstract public function updateOne($params);
}

class NewsArticle
    extends Article
{
    public function getOne($id)
    {
        return $this->db->dbQueryOne("SELECT * FROM `newsarticles` WHERE `id`=" . $id . ";");
    }

    public function insertOne($item)
    {
        return $this->db->dbExec("
          INSERT INTO `newsarticles` (`title`, `text`)
          VALUES ('" . $item['title'] . "', '" . $item['text'] . "');");
    }

    public function updateOne($params)
    {
        // TODO: Implement updateOne() method.
    }
}

$st = new NewsArticle();
var_dump($st);
var_dump($st->insertOne(['title' => 'Четвёртая новостная статья', 'text' => 'Текст четвёртой новостной статьи',]));
