<article>
        <header>
            <h1><?php echo $one_newsarticle['title']; ?></h1>
<h3><?php echo $one_newsarticle['author']; ?></h3>
</header>
<div><?php echo $one_newsarticle['text']; ?>
    <a href="/controllers/update_newsarticle.php?id=<?php echo $one_newsarticle['id']; ?>">[Редактировать]</a>
</div>
</article>