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

    abstract public function updateOne($item);
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

    public function updateOne($item)
    {
        return $this->db->dbExec("
          UPDATE `newsarticles` SET `title`='" . $item['title'] ."', `text`='" . $item['text'] ."'
           WHERE id=" . $item['id']);
/*
        UPDATE  `newsarticles` SET  `title` =  'Четвёртая новостная интересная статья' WHERE  `newsarticles`.`id` =4;

  */  }
}

$st = new NewsArticle();
var_dump($st);
var_dump($st->updateOne(['title' => 'Четвёртая вот новостная статья', 'text' => 'Текст четвёртой вот новостной статьи', 'id' => 4,]));
