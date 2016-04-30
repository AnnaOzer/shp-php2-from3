<?php

class NewsController
    extends AController
{
    private $model;

    private $view;

    public function __construct()
    {
        $this->model = new News();
        $this->view = new View();
    }

    protected function actionAll()
    {
        $this->view->newsarticles = $this->model->findAll();
        echo $this->view->display('views/index.php');
    }

    protected function actionOne()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        $this->view->one_newsarticle = $this->model->findByPk($id);
        echo $this->view->display('views/one_newsarticle.php');

    }

    protected function actionEdit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

        $this->view->updating_newsarticle = $this->model->findByPk($id);
        echo $this->view->display('views/update_newsarticle_form.php');

    }

    protected function actionUpdate()
    {
        if(!empty($_POST)) {
            if(isset($_POST['id'])) {
                $id = (int)$_POST['id'];

                $updated_newsarticle = $this->model->findByPk($id);

                if(isset($_POST['title'])) {
                $updated_newsarticle->title = $_POST['title'];
                }

                if(isset($_POST['author'])) {
                $updated_newsarticle->author = $_POST['author'];
                }


                if(isset($_POST['text'])) {
                $updated_newsarticle->text = $_POST['text'];
                }

                $this->model->updateOne($updated_newsarticle);

            }
        }

        header('Location:/?r=news/all');

    }

    protected function actionCreate()
    {
        echo $this->view->display('views/add_newsarticle_form.php');
    }

    protected function actionSave()
    {
        $adding_newsarticle = [];

        if(!empty($_POST)) {
            if(isset($_POST['text'])) {
                $adding_newsarticle['text'] = $_POST['text'];

                $adding_newsarticle['author'] = isset($_POST['author']) ? $_POST['author'] : 'Anonymous';

                $adding_newsarticle['title'] = isset($_POST['title']) ? $_POST['title'] : 'Статья';

                $this->model->insertOne($adding_newsarticle);
            }
        }

        header('Location:./?r=news/all');
    }
}


