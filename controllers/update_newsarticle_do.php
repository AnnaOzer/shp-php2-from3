<?php

require_once  __DIR__ . '/../models/Article.php';

if(!empty($_POST)) {
    if(isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        $newsarticle = new NewsArticle();
        $updated_newsarticle = $newsarticle->getOne($id);

        if(isset($_POST['title'])) {
            $updated_newsarticle['title'] = $_POST['title'];
        }

        if(isset($_POST['author'])) {
            $updated_newsarticle['author'] = $_POST['author'];
        }

        if(isset($_POST['text'])) {
            $updated_newsarticle['text'] = $_POST['text'];
        }

        $newsarticle->updateOne($updated_newsarticle);

    }
}

header('Location:../index.php');