<?php

require 'boot.php';

$newsArticle = new NewsArticle();

$view = new View();
$view->newsarticles = $newsArticle->getAll();

$view->display(__DIR__ . '/views/index.php');
$view->display(__DIR__ . '/views/add_newsarticle_form.php');
