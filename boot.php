<?php


// функция будет вызвана автоматически, когда встретит класс, который не был ранее загружен
function __autoload($class)
{
    // логика поиска файлов для класса
    require 'classes/' . $class . '.php';
}

require_once __DIR__ . '/models/Article.php';