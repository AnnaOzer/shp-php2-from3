<?php

// хотим класс, который может хранить в себе всё что угодно
class Storage
{
    private $__data = [];

    // вызывается каждый раз, когда пытаетесь установить значение не заданного в классе свойства
    public function __set($key, $value)
    {
        $this->__data[$key] = $value;

    }
}

$st = new Storage();
$st->foo = 'foo1';
$st->bar = 'bar11';
var_dump($st);