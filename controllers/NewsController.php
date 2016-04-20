<?php

class NewsController
    extends AController
{
    protected function actionAll()
    {
        $newsArticle = new NewsArticle();
        $view = new View();
        $view->newsarticles = $newsArticle->getAll();

        echo $view->display('views/index.php');

    }

    protected function actionOne()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        $newsArticle = new NewsArticle();
        $view = new View();
        $view->one_newsarticle = $newsArticle->getOne($id);

        echo $view->display('views/one_newsarticle.php');

    }
}

/*

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$newsarticle = new NewsArticle;
$one_newsarticle = $newsarticle->getOne($id);

require '../views/one_newsarticle.php';
 * */