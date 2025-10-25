
<a href="/">main</a>
<a href="/product">Список продуктов</a>
<!--<a href="/categoryProducts">Категории товаров</a>-->
<hr>
<h1>Категории:</h1>
<?php foreach ($categories as $category): ?>
    <h2><?= $category['name'] ?></h2>
    <a href="/category/<?= $category['id'] ?>/delete">Удалить</a>
    <a href="/category/<?= $category['id'] ?>/edit">Редактировать</a>
<?php endforeach; ?>
<br>
<a href="/category/create">Создать</a>
