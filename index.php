<?php

require_once __DIR__ . '/models/Article.php';

$newsArticle = new NewsArticle();
$newsarticles = $newsArticle->getAll();

require __DIR__ . '/views/index.php';