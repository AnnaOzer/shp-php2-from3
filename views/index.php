<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Все новости</title>
</head>
<body>
<h1>Все новости</h1>
<?php foreach($newsarticles as $newsarticle):?>
    <article>
        <header>
            <h1><?php echo $newsarticle['title']; ?></h1>
            <h3><?php echo $newsarticle['author']; ?></h3>
        </header>
        <div><?php echo $newsarticle['text']; ?>
            <a href="/?r=news/one&id=<?php echo $newsarticle['id']; ?>">[Показывать одну эту новость]</a>
            <a href="/?r=news/edit&id=<?php echo $newsarticle['id']; ?>">[Редактировать эту новость]</a>
        </div>
    </article>
<?php endforeach; ?>
</body>
</html>