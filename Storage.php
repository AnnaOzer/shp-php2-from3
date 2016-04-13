<?php

class Storage
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
}

$st = new Storage();
$st->foo = 'bar';
echo $st->foo;