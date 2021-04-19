<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Best Buying Countries</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/orders/selectCountries.php';
require_once 'bll/getSort.php';
?>

<body>
<div id="countries" class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {

        ?>
        <h4>Best Buying Countries</h4>
        <table id="myTable" class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th><a href="?orderBy=country<?php getReverseSort('country'); ?>" title="Sort by Country">Country</a>
                </th>
                <th><a href="?orderBy=orders_nb<?php getReverseSort('orders_nb'); ?>" title="Sort by Orders">Nb of
                        Orders</a></th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th><a href="?orderBy=orders_total<?php getReverseSort('orders_total'); ?>" title="Sort by Total">Total</a>
                    </th><?php
                }
                ?>
                <th><a href="?orderBy=avg<?php getReverseSort('avg'); ?>" title="Sort by Average">Average by Order</a>
                </th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($rowAll as $row) {
                ?>
                <tr>
                    <td><a href="countryDetails.php?country=<?php echo $row['country'] ?>
                           " title="see all orders">
                            <?php echo $row['country']; ?></a></td>
                    <td><?php echo $row['orders_nb']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['orders_total']; ?> €</td><?php
                    }
                    ?>
                    <td><?php echo $row['avg']; ?> €</td>
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