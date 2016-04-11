<?php

require_once __DIR__ . '/../models/Article.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;

$newsarticle = new NewsArticle();
$updating_newsarticle = $newsarticle->getOne($id);

require __DIR__ . '/../views/update_newsarticle_form.php';


