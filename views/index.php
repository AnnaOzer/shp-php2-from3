<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Все новости</title>
</head>
<body>
<h1>Все новости</h1>
<?php
// var_dump($newsarticles);

?>
<?php foreach($newsarticles as $newsarticle1):?>
    <article>
        <header>
            <h1><?php echo $newsarticle1->title; ?></h1>
            <h3><?php echo $newsarticle1->author; ?></h3>
        </header>
        <div><?php echo $newsarticle1->text; ?>
            <a href="/?r=news/one&id=<?php echo $newsarticle1->id; ?>">[Показывать одну эту новость]</a>
        </div>
    </article>
<?php endforeach; ?>
<h3><a href="?r=news/create">[Добавить статью]</a></h3>
</body>
</html>