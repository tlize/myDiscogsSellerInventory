<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order Items</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
$order_num = $_GET['order_num'];
?>

<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php';
    if (isset($auth_user)) {
        ?>
        <h4>Order # <?php echo $order_num; ?></h4>


        <ul>
            <?php
            require_once './dal/order_items/selectOrderItems.php';
            foreach ($rowAll as $row) {
                ?>

                <li>
                    <h5><?php echo $row['description']; ?>

                        <?php
                        if (isset($super_admin)) {
                            echo ' : ' . $row['price'] . ' €';
                        }
                        ?>
                    </h5>
                </li>

                <?php
            }
            ?>
        </ul>

        <?php
        require_once 'dal/orders/selectOrderTotal.php';
        $total = $rowAll[0]['total_amount'];

        if (isset($super_admin)) {
            ?>
            <h5>Total : <?php echo $total ?> €</h5>
            <?php
        }

    } else {
        echo 'sorry you can\'t !';
    }

    ?>

</div>
</body>
</html>