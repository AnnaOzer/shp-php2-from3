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
var_dump($connection);
