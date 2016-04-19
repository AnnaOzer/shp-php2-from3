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
    public $author;

    public function getOne($id)
    {
        return $this->db->dbQueryOne("SELECT * FROM `newsarticles` WHERE `id`=" . $id . ";");
    }

    public function insertOne($item)
    {
        return $this->db->dbExec("
          INSERT INTO `newsarticles` (`title`, `text`, `author`)
          VALUES ('" . $item['title'] . "', '" . $item['text'] . "', '" . $item['author'] . "');");
    }

    public function updateOne($item)
    {
        return $this->db->dbExec("
          UPDATE `newsarticles` SET `title`='" . $item['title'] ."', `text`='" . $item['text'] ."', `author`='" . $item['author'] ."'
           WHERE id=" . $item['id']);
    }

    public function getAll() {
        return $this->db->dbQuery("SELECT * FROM `newsarticles`");
    }
}
/*
$st = new NewsArticle();
$st->db->dbExec("ALTER TABLE  `newsarticles` ADD  `author` VARCHAR( 100 );");

*/