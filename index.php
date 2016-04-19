<?php

require 'boot.php';

// r=news/all

// начало роутера
$route = $_GET['r'];
$routeParts = explode('/', $route);
$controllerClassName = ucfirst($routeParts[0]).'Controller';
$actionName= $routeParts[1];
// конец роутера

// начало фронтконтроллера
$controller = new $controllerClassName;
$controller->action($actionName);
// конец фронтконтроллера

// смотреть на http://shp-php2-triple/?r=news/all
