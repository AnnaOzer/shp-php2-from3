<h3>Редактирование новостной статьи</h3>

<form method="post" action="/?r=news/update">
    <input type="hidden" name="id" value="<?php echo $updating_newsarticle['id']; ?>">
    Название: <input type="text" name="title" value="<?php echo $updating_newsarticle['title']; ?>"><br>
    Автор: <input type="text" name="author" value="<?php echo $updating_newsarticle['author']; ?>"><br>
    Текст: <textarea name="text"><?php echo $updating_newsarticle['text']; ?></textarea><br>
    <input type="submit" value="Обновить">
</form>