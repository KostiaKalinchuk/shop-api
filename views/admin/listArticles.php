<?php include "views/templates/headerAdmin.php" ?>

<h1>Список артикулів</h1>

<?php if (isset($results['errorMessage'])) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

<?php if (isset($results['statusMessage'])) { ?>
    <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

<table>
    <tr>
        <th>Категорія</th>
        <th>Назва</th>
        <th>Процесор</th>
        <th>Ціна</th>
        <th>Камера</th>
        <th>Розміри</th>
        <th>Вага</th>
        <th>Дисплей</th>
        <th>Батерея</th>
        <th>Пам'ять</th>
        <th>Колір</th>
        <th>Система</th>
        <th>Тип з'язку</th>
        <th>Матеріал</th>
        <th>Навігація</th>
        <th>Аудіо</th>
        <th>Відеопроцесор</th>
        <th>Опис</th>
    </tr>

    <?php foreach ($results['articles'] as $article) { ?>

        <tr onclick="location='admin.php?action=editArticle&amp;articleId=<?php echo $article->id ?>'">
            <td>
                <?php echo $results['categories'][$article->categoryId]->name ?>
            <td>
                <?php echo $article->name ?></td>
            </td>
            <td>
                <?php echo $article->cpu ?></td>
            </td>
            <td>
                <?php echo $article->price ?>
            </td>
            <td>
                <?php echo $article->camera ?>
            </td>
            <td>
                <?php echo $article->size ?>
            </td>
            <td>
                <?php echo $article->weight ?>
            </td>
            <td>
                <?php echo $article->display ?>
            </td>
            <td>
                <?php echo $article->battery ?>
            </td>
            <td>
                <?php echo $article->memory ?>
            </td>
            <td>
                <?php echo $article->color ?>
            </td>
            <td>
                <?php echo $article->system ?>
            </td>
            <td>
                <?php echo $article->connection ?>
            </td>
            <td>
                <?php echo $article->material ?>
            </td>
            <td>
                <?php echo $article->navigation ?>
            </td>
            <td>
                <?php echo $article->audio ?>
            </td>
            <td>
                <?php echo $article->video ?>
            </td>
            <td>
                <?php echo $article->description ?></td>
            </td>
        </tr>

    <?php } ?>

</table>

<p><?php echo $results['totalRows'] ?> арикулів<?php echo ($results['totalRows'] != 1) ? '' : 'а' ?> всього</p>

<p><a href="admin.php?action=newArticle">Додати артикул</a></p>

<?php include "views/templates/footerAdmin.php" ?>

