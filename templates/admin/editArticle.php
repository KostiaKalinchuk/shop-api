<?php include "templates/include/headerAdmin.php" ?>
<?php include "templates/admin/include/header.php" ?>

<h1><?php echo $results['pageTitle'] ?></h1>

<form action="admin.php?action=<?php echo $results['formAction'] ?>" method="post">
    <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>

    <?php if (isset($results['errorMessage'])) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>

    <ul>
        <li>
            <label for="name">Назва</label>
            <input type="text" name="name" id="name" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->name) ?>"/>
        </li>
        <li>
            <label for="price">Ціна</label>
            <input type="text" name="price" id="price" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->price) ?>"/>
        </li>
        <li>
            <label for="cpu">Процесор</label>
            <input type="text" name="cpu" id="cpu" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->cpu) ?>"/>
        </li>
        <li>
            <label for="camera">Камера</label>
            <input type="text" name="camera" id="camera" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->camera) ?>"/>
        </li>
        <li>
            <label for="size">Розміри</label>
            <input type="text" name="size" id="size" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->size) ?>"/>
        </li>
        <li>
            <label for="weight">Вага</label>
            <input type="text" name="weight" id="weight" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->weight) ?>"/>
        </li>
        <li>
            <label for="display">Дисплей</label>
            <input type="text" name="display" id="display" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->display) ?>"/>
        </li>
        <li>
            <label for="battery">Батерея</label>
            <input type="text" name="battery" id="battery" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->battery) ?>"/>
        </li>
        <li>
            <label for="memory">Память</label>
            <input type="text" name="memory" id="memory" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->memory) ?>"/>
        </li>
        <li>
            <label for="color">Колір</label>
            <input type="text" name="color" id="color" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->color) ?>"/>
        </li>
        <li>
            <label for="system">Система</label>
            <input type="text" name="system" id="system" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->system) ?>"/>
        </li>
        <li>
            <label for="connection">Тип звязку</label>
            <input type="text" name="connection" id="connection" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->connection) ?>"/>
        </li>
        <li>
            <label for="material">Матеріал</label>
            <input type="text" name="material" id="material" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->material) ?>"/>
        </li>
        <li>
            <label for="navigation">Навігація</label>
            <input type="text" name="navigation" id="navigation" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->navigation) ?>"/>
        </li>
        <li>
            <label for="audio">Аудіо</label>
            <input type="text" name="audio" id="audio" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->audio) ?>"/>
        </li>
        <li>
            <label for="video">Відеопроцесор</label>
            <input type="text" name="video" id="video" required autofocus maxlength="255"
                   value="<?php echo htmlspecialchars($results['article']->video) ?>"/>
        </li>
        <li>
            <label for="description">Опис</label>
            <textarea name="description" id="description" required maxlength="1000"
                      style="height: 5em;"><?php echo htmlspecialchars($results['article']->description) ?></textarea>
        </li>
        <li>
            <label for="categoryId">Категорія</label>
            <select name="categoryId">
                <option value="0"<?php echo !$results['article']->categoryId ? " selected" : "" ?>>не вибрано</option>
                <?php foreach ($results['categories'] as $category) { ?>
                    <option value="<?php echo $category->id ?>"<?php echo ($category->id == $results['article']->categoryId) ? " selected" : "" ?>><?php echo htmlspecialchars($category->name) ?></option>
                <?php } ?>
            </select>
        </li>
    </ul>

    <div class="buttons">
        <input type="submit" name="saveChanges" value="Зберегти"/>
        <input type="submit" formnovalidate name="cancel" value="Відміна"/>
    </div>
</form>

<?php if ($results['article']->id) { ?>
    <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>"
          onclick="return confirm('Видаити новину?')">Видалити артикул</a></p>
<?php } ?>

<?php include "templates/include/footerAdmin.php" ?>

