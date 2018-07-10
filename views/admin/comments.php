<?php include "views/templates/headerAdmin.php" ?>

<h1>Повідомлення</h1>

<table>
    <tr>
        <th>Імя</th>
        <th>Email</th>
        <th>Повідомлення</th>
    </tr>

    <?php foreach ( $results['comments'] as $comment ) { ?>

        <tr onclick="location='admin.php?action=comments'">
            <td>
                <?php echo $comment->name?>
            </td>
            <td>
                <?php echo $comment->email?>
            </td>
            <td>
                <?php echo $comment->message?>
            </td>
        </tr>

    <?php } ?>

</table>

<p><?php echo $results['totalRows']?> повідомлен<?php echo ( $results['totalRows'] != 1 ) ? 'ь' : 'ня' ?> всього</p>

<?php include "views/templates/footerAdmin.php" ?>

