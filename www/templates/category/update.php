<h2>Редактировать категорию</h2>
<form action="/category/<?= $category['id'] ?>/update" method="post">
    <input type="text" name="name" placeholder="Название" value="<?= $category['name'] ?>" required>
    <br>
    <select name="category_stages">
        <option value="">Без родительской категории</option>
        <?php foreach ($parentCategories as $parentCategory): ?>
            <option value="<?= $parentCategory['id'] ?>" <?= $parentCategory['id'] == $category['category_stages'] ? 'selected' : '' ?>>
                <?= $parentCategory['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br>
    <input type="submit" value="Обновить категорию">
</form>
