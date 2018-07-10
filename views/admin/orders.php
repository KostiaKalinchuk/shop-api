<?php include "views/templates/headerAdmin.php" ?>

<h1>Повідомлення</h1>

<table>
    <tr>
        <th>Назва товару</th>
        <th>Ціна</th>
        <th>Кількість</th>
    </tr>

    <?php foreach ( $results['orders'] as $order ) { ?>

        <tr onclick="location='admin.php?action=orders'">
            <td>
                <?php echo $order->name?>
            </td>
            <td>
                <?php echo $order->price?> грн
            </td>
            <td>
                <?php echo $order->count?>
            </td>
        </tr>

    <?php } ?>

</table>

<p><?php echo $results['totalRows']?> замовлен<?php echo ( $results['totalRows'] != 1 ) ? 'ь' : 'ня' ?> всього</p>

<?php include "views/templates/footerAdmin.php" ?>

