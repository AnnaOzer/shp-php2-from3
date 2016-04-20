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
        // $view->display(__DIR__ . '/views/add_newsarticle_form.php');

    }

    protected function actionOne()
    {
        $newsArticle = new NewsArticle();
        $view = new View();
        $view->one_newsarticle = $newsArticle->getOne($_GET['id']);

        echo $view->display('views/one_newsarticle.php');

    }
}
