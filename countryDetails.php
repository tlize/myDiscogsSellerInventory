<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Country | Orders</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/selectCountryDetails.php';
require_once 'bll/getSort.php';
?>

<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {
        ?>
        <br>
        <h4>Orders from : <?php echo $_GET['country']; ?></h4>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th>Order #</a></th>
                <th>Buyer</th>
                <th>
                    <a href="?country=<?php echo $_GET['country']; ?>&orderBy=order_date<?php getCountryDetailSort('order_date'); ?>"
                       title="Sort by Order Date">Order Date</a></th>
                <th>
                    <a href="?country=<?php echo $_GET['country']; ?>&orderBy=items_nb<?php getCountryDetailSort('items_nb'); ?>"
                       title="Sort by Items Number">Items</a></th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th>
                    <a href="?country=<?php echo $_GET['country']; ?>&orderBy=total_amount<?php getCountryDetailSort('total_amount'); ?>"
                       title="Sort by Total">Total</a></th><?php
                }
                ?>
                <th>Shipping Address</th>
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
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['buyer']; ?></td><?php
                    } else {
                        ?>
                        <td>xxx</td><?php
                    }
                    ?>

                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['items_nb']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['total_amount']; ?> €</td><?php
                    }
                    ?>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['shipping_address']; ?></td><?php
                    } else {
                        ?>
                        <td><?php echo 'somewhere in ' . $_GET['country']; ?></td><?php
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
        echo '<br><br><h6>sorry you can\'t !</h6>';
    }

    ?>

</div>
</body>
</html>

