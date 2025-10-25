
<h1>Создание категории</h1>
<form action="/category/store" method="post">
    <input type="text" name="name" placeholder="Название категории" required>
    <br>
    <select name="category_stages">
        <option value="">Без родительской категории</option>
        <?php foreach ($parentCategories as $parentCategory): ?>
            <option value="<?= $parentCategory['id'] ?>"><?= $parentCategory['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Создать категорию">
</form>
