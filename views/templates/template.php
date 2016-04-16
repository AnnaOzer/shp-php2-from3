<?php
/*
 *@var array $articles Список всех новостей
 **/
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<h1>Подключился шаблон для вывода статей</h1>
<?php foreach ($articles as $art): ?>
    <h3><?php echo $art['title']; ?></h3>
    <strong><?php echo $art['author']; ?></strong>
    <div><?php echo $art['text']; ?></div>
<?php endforeach; ?>
</body>
</html>