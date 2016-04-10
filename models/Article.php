<?php

require_once __DIR__ . '/../functions/DbConnect.php';

abstract class Article
{
    public $title;
    public $text;

    private $db;
    public function construct()
    {
        $this->db = new DbConnect();
    }

    abstract public function getOne($params);
    abstract public function insertOne($params);
    abstract public function updateOne($params);
}

class NewsArticle
    extends Article
{

    public function getOne($params)
    {

    }

    public function insertOne($params)
    {
        // TODO: Implement insertOne() method.
    }

    public function updateOne($params)
    {
        // TODO: Implement updateOne() method.
    }
}