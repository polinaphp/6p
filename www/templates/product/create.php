<a href="/product">Назад</a>
<h2>Добавление продукта</h2>
<form action="/product/create" method="post">
    <input type="text" name="name" placeholder="Название продукта" required>
    <br>
    <select name="category_id" required>
        <option value="">Выберите категорию</option>
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="text" name="property_id" placeholder="ID свойства (если нужно)" value="">
    <br>
    <input type="submit" value="Создать продукт">
</form>
