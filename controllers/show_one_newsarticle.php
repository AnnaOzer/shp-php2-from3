<?php


$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$newsarticle = new NewsArticle;
$one_newsarticle = $newsarticle->getOne($id);

require '../views/one_newsarticle.php';