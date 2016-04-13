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

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        // TODO: Implement valid() method.
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
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

