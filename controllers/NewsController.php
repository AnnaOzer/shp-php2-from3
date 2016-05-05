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

}


