<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Best Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/orders/selectOrders.php';
require_once './bll/getSort.php';
?>

<body>
<div id="orders" class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {

        ?>
        <h4>Best Orders</h4>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Order #</th>
                <th><a href="?orderBy=order_date<?php getReverseSort('order_date'); ?>" title="Sort by Order Date">Order
                        Date</a></th>
                <th>Buyer</th>
                <th>Country</th>
                <th><a href="?orderBy=items_nb<?php getReverseSort('items_nb'); ?>"
                       title="Sort by Number of Items ">Items</a></th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th><a href="?orderBy=total_amount<?php getReverseSort('total_amount'); ?>" title="Sort by Total">Total</a>
                    </th><?php
                }
                ?>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($rowAll as $row) {
                ?>
                <tr>
                    <td><a href="orderItems.php?order_num=<?php echo $row['order_num'] ?>
                           " title="see order detail">
                            <?php echo $row['order_num']; ?></a></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['buyer']; ?></td><?php
                    } else {
                        ?>
                        <td>xxx</td><?php
                    }
                    ?>

                    <td><?php echo $row['country']; ?></td>
                    <td><?php echo $row['items_nb']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['total_amount']; ?> €</td><?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php
    } else {
        echo 'sorry you can\'t !';
    }

    ?>

</div>
</body>
</html>