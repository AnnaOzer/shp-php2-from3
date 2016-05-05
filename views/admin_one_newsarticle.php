<article>
    <header>
        <h1><?php echo $one_newsarticle->title; ?></h1>

        <h3><?php echo $one_newsarticle->author; ?></h3>
    </header>
    <div><?php echo $one_newsarticle->text; ?>
        <a href="/?r=admin/edit&id=<?php echo $one_newsarticle->id; ?>">[Редактировать эту новость]</a>
        <a href="/?r=admin/delete&id=<?php echo $newsarticle1->id; ?>">[Удалить эту новость]</a>
    </div>
</article>