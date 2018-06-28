<?php include "views/templates/headerAdmin.php" ?>

      <h1>Список категорій</h1>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

      <table>
        <tr>
          <th>Категорії</th>
        </tr>

<?php foreach ( $results['categories'] as $category ) { ?>

        <tr onclick="location='admin.php?action=editCategory&amp;categoryId=<?php echo $category->id?>'">
          <td>
            <?php echo $category->name?>
          </td>
        </tr>

<?php } ?>

      </table>

      <p><?php echo $results['totalRows']?> категорі<?php echo ( $results['totalRows'] != 1 ) ? 'ї' : 'я' ?> всього</p>

      <p><a href="admin.php?action=newCategory">Додати нову категорію</a></p>

<?php include "views/templates/footerAdmin.php" ?>

