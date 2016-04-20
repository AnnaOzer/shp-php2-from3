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

    protected function actionEdit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        $newsArticle = new NewsArticle();
        $view = new View();
        $view->updating_newsarticle = $newsArticle->getOne($id);

        echo $view->display('views/update_newsarticle_form.php');

    }

    protected function actionUpdate()
    {
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

        header('Location:/?r=news/all');

    }
}


/*

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$newsarticle = new NewsArticle;
$one_newsarticle = $newsarticle->getOne($id);

require '../views/one_newsarticle.php';
 * */