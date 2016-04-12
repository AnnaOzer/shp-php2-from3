<?php

/*
создали класс
чтобы иметь возможность задавать любые свойства объектам этого класса,
даже не описанные
*/
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
        if(isset($this->__data[$key])) {
            return $this->__data[$key];
        } else {
            echo 'Error';
        }
    }
}

$st = new Storage();
$st->foo = 'foo1';
$st->bar = 'bar11';

echo $st->foo;
echo $st->bar;

var_dump($st->zoo); // null