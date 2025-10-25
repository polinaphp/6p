<a href="/">Назад к категориям</a>
<h1>Подкатегории:</h1>
<?php if (empty($subcategories)): ?>
    <p>Нет подкатегорий для этой категории.</p>
<?php else: ?>
    <?php foreach ($subcategories as $subcategory): ?>
   <h2>
  <a href=""><?= $subcategory['name'] ?></a>
    </h2>
<h3>Товары:</h3>
 <?php if (empty($subcategory['products'])): ?>
  <p>Нет товаров в этой подкатегории.</p>
 <?php else: ?>
      <ul>
 <?php foreach ($subcategory['products'] as $product): ?>
 <li><?= $product['name'] ?></li>
 <?php endforeach; ?>
 </ul>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>