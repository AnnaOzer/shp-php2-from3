<?php

require_once __DIR__ . '/../functions/DbConnect.php';

abstract class Article
{
    public $title;
    public $text;

    abstract public function getOne($params);
    abstract public function insertOne($params);
    abstract public function updateOne($params);
}