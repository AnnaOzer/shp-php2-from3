<?php

interface IModel {
    public function getAll();
    public function getOne($id);
}

interface IHasAuthor {
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

    public function countData()
    {
        return count($this->__data);
    }
}

$st = new Storage();
$st->foo = 1123;
$st->bar = 456;
$st->baz = 789;

echo $st->countData(); // 3, сработает, но это нестандартно
