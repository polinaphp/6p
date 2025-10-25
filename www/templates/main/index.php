<a href="/category">CRUD категорий</a>
<h1>Категории:</h1>
<?php foreach ($categories as $category): ?>
<h2>
<a href="/category/<?= $category['id'] ?>/subcategories"><?= $category['name'] ?></a>
</h2>
    <h3>Товары:</h3>
    <?php if (empty($category['products'])): ?>
        <p>Нет товаров в этой категории.</p>
    <?php else: ?>
        <ul>
            <?php foreach ($category['products'] as $product): ?>
                <li><?= $product['name'] ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

<?php endforeach; ?>