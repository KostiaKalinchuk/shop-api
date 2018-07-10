<?php include "views/templates/headerAdmin.php" ?>

      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="categoryId" value="<?php echo $results['Category']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>
          <li>
            <label for="name">Назва категорії</label>
            <input type="text" name="name" id="name" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['Category']->name )?>" />
          </li>
        </ul>
        <div class="buttons">
          <input type="submit" name="saveChanges" value="Зберегти" />
          <input type="submit" formnovalidate name="cancel" value="Відміна" />
        </div>
      </form>

<?php if ( $results['Category']->id ) { ?>
      <p><a href="admin.php?action=deleteCategory&amp;categoryId=<?php echo $results['Category']->id ?>" onclick="return confirm('Видалити категорію?')">Видалити категорію</a></p>
<?php } ?>

<?php include "views/templates/footerAdmin.php" ?>

