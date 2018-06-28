<?php include "views/templates/headerAdmin.php" ?>

<form action="admin.php?action=login" method="post" style="width: 50%;">
    <input type="hidden" name="login" value="true"/>

    <?php if (isset($results['errorMessage'])) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
    <?php } ?>

    <ul>
        <li>
            <label for="username">Імя</label>
            <input type="text" name="username" id="username" required autofocus maxlength="20"/>
        </li>
        <li>
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" required maxlength="20"/>
        </li>

    </ul>
    <div class="buttons">
        <input type="submit" name="login" value="Увійти"/>
    </div>

</form>

<?php include "views/templates/footerAdmin.php" ?>

