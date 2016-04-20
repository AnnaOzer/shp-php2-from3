<?php

function __autoload($class)
{
    $classDirs = ['functions', 'models', 'views', 'controllers',];

    foreach ($classDirs as $classDir) {

        if(is_readable($classDir . '/' . $class . '.php')) {
            require $classDir . '/' . $class . '.php';
        }
    }

}

