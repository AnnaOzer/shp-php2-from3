<?php

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

