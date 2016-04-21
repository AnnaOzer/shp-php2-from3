<?php

function __autoload($class)
{
    $classDirs = ['functions', 'models', 'views', 'controllers',];

    foreach ($classDirs as $classDir) {

        $classPath = __DIR__ . '/' . $classDir . '/' . $class . '.php';

        if(is_readable($classPath)) {

            require $classPath;
            break;
        }
    }

}

