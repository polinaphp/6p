<a href="/">main</a>
<a href="/category">Список категорий</a>
<!--<a href="/categoryProducts">Категории товаров</a>-->
<hr>
<h1>Список продуктов</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Категория</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
 <td><?= $product['id'] ?></td>
 <td><?=$product['name']?></td>
 <td>
     <?php
     $category = \ORM::forTable('category')->findOne($product['category_id']);
     echo $category ? $category['name'] : 'Не указана';
     ?>
            </td>
            <td>
                <a href="/product/<?= $product['id'] ?>/edit">Редактировать</a>
                <a href="/product/<?= $product['id'] ?>/delete">Удалить</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="/product/create">Добавить новый продукт</a>
