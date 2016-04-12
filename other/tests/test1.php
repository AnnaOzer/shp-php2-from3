<?php

interface IModel {
    public function getAll();
    public function getOne($id);
}

interface IHasAuthor {
    public function getAll();
    public function getOne($id);
    public function getAuthor();
}
class NewsModel
    implements Imodel, IHasAuthor
{

    public function getAll()
    {
        echo 'Get all news!';
    }

    public function getOne($id)
    {
        echo 'Get one article #' .  $id;
    }

    public function getAuthor()
    {
        echo 'Лев Толстой';
    }
}

$model =new NewsModel();
$model->getAll();
$model->getAuthor();



class Storage
{
    // в этом свойстве будем хранить все необъявленные свойства
    private $__data = [];

    // вызывается каждый раз, когда пытаетесь установить значение не заданного в классе свойства
    public function __set($key, $value)
    {
        $this->__data[$key] = $value;

    }

    // вызывается при попытке чтения необъявленных свойств
    public function __get($key)
    {
        return $this->__data[$key];
    }
}

