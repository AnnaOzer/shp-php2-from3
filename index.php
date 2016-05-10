<?php

require __DIR__ . '/boot.php';

$router = new Router($_GET['r']);

$controllerName = ucfirst($router->controller).'Controller';
$controller = new $controllerName;
$controller->action($router->action);

?><hr><?php

var_dump($_GET); // array(1) { ["__r"]=> string(9) "index.php" }



