<?php

require __DIR__ . '/boot.php';

$router = new Router($_GET['r']);

$controllerName = ucfirst($router->controller).'Controller';
$controller = new $controllerName;
$controller->action($router->action);

?><hr><?php

echo News::getTableName();

?><hr><?php

$connection = new DbConnection();
var_dump($news = $connection->query("SELECT * FROM newsarticles"));

?><hr><?php
$news = $connection->queryOne("SELECT * FROM newsarticles WHERE id=:id", [':id' => 5]);
var_dump($news);

?><hr><?php
$result=$connection->queryExec("INSERT INTO newsarticles (title, text, author) VALUES ('Название211', 'Текст211', 'Автор211' )");
var_dump($result);