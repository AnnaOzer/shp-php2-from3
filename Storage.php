<?php

class Storage
    implements Countable, Iterator
{
    private $__data = [];

    public function __set($key, $value)
    {
        $this->__data[$key] =  $value;
    }

    public function __get($key)
    {
        return $this->__data[$key];
    }

    public function count()
    {
        return count($this->__data);
    }


    public function current()
    {
        return current($this->__data);
    }

    public function next()
    {
        next($this->__data);
    }

    public function key()
    {
        return key($this->__data);
    }

    public function valid()
    {
        if(null===key($this->__data)) {
            return false;
        }
        return true;
    }

    public function rewind()
    {
        reset($this->__data);
    }
}

$st = new Storage();
$st->foo = 'bar';
$st->foo2 = 'bar2';
$st->foo3 = 'bar3';

echo $st->foo; // bar
echo $st->count(); // 3

echo $st->current(); // bar
$st->next();
echo $st->current(); // bar2

echo $st->key(); // foo2

var_dump($st->valid()); //true указатель на втором элементе массива
$st->next();
var_dump($st->valid()); // true указатель на третьем элементе массива
$st->next();
var_dump($st->valid()); // false указатель вышел за пределы массива

$st->rewind();
echo $st->key(); // foo это ключ первого элемента