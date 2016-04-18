<?php

// функция будет вызвана автоматически, когда встретит класс, который не был ранее загружен
function __autoload($class)
{
    // логика поиска файлов для класса
    require 'classes/' . $class . '.php';
}

/*
require_once __DIR__ . '/classes/View.php';
*/

require_once __DIR__ . '/models/Article.php';

$newsArticle = new NewsArticle();

$view = new View();
$view->newsarticles = $newsArticle->getAll();

$view->display(__DIR__ . '/views/index.php');
$view->display(__DIR__ . '/views/add_newsarticle_form.php');
