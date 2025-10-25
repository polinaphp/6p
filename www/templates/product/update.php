<a href="/product">Назад</a>
<hr>
<h1>Редактирование продукта</h1>
<form action="/product/<?= $product['id'] ?>/update" method="post">
    <input type="text" name="name" placeholder="Название продукта" value="<?= $product['name'] ?>" required>
    <br>
    <select name="category_id" required>
        <option value="">Выберите категорию</option>
        <?php foreach ($categories as $category): ?>
<option value="<?= $category['id'] ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
<?= $category['name'] ?>
 </option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="number" name="property_id" placeholder="ID свойства" value="<?= $product['property_id'] ?>">
    <br>
    <input type="submit" value="Обновить">
</form>
