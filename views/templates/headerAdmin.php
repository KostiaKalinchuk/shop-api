<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($results['pageTitle']) ?></title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div id="container">
    <div id="adminHeader">
        <h2>Адмінпанель | <a href="http://localhost:3000/">Сайт</a></h2>
        <p>Ви увійшли як <b><?php echo htmlspecialchars($_SESSION['username']) ?></b>.
            <a href="admin.php?action=listArticles">Редагувати артикули</a> |
            <a href="admin.php?action=listCategories">Редагувати категорії</a> |
            <a href="admin.php?action=comments">Повідомлення</a> |
            <a href="admin.php?action=orders">Замовлення</a> |
            <a href="admin.php?action=logout">Вийти</a></p>
    </div>
