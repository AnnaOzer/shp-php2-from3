<?php
require_once '../models/Article.php';

$adding_newsarticle = [];

if(!empty($_POST)) {
    if(isset($_POST['text'])) {
        $adding_newsarticle['text'] = $_POST['text'];

        $adding_newsarticle['author'] = isset($_POST['author']) ? $_POST['author'] : 'Anonymous';

        $adding_newsarticle['title'] = isset($_POST['title']) ? $_POST['title'] : 'Статья';

        $newsarticle = new NewsArticle();
        $newsarticle->insertOne($adding_newsarticle);
    }
}

header('Location:../index.php');