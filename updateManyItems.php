<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order | Updates confirm</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php

// roughly the same as updateDatabase
// a little more work to fetch items from the temp table
echo 'ici';
require 'inc/template/header.php';
if (isset($super_admin)) {

    $buyer = $_POST['buyer'];
    $order_date = $_POST['order_date'];
    $order_num = '1797099-' . $_POST['order_num'];
    $total = $_POST['total'];
    $shipping_address = $_POST['shipping_address'];

    $country = null;
    require_once 'dal/countries/selectCountriesList.php';
    foreach ($countries as $row) {
        $test = strpos($shipping_address, $row['Name']);
        if ($test !== false) {
            $country = $row['Name'];
        }
    }

    require_once './dal/temp/selectAllFromTemp.php';

    foreach ($rowAll as $row) {
        $item_id = $row['item_id'];
        $item_price = $row['item_price'];
        $description = $row['description'];


        require './dal/inventory/update/setManyItemsSold.php';
    }
    require_once 'dal/orders/insertIntoOrders.php';
// temp table is empty again at the end of updating
    require_once './dal/temp/deleteFromTemp.php';
    require_once 'index.php';
} else {
    ?>
    <body>
    <br><br>
    <h5>sorry, no updating !</h5>
    <h5>if you feel like buying these items, go to <a class="shopLink"
                                                      href="https://www.discogs.com/seller/tlize/profile"
                                                      target="_blank">my Discogs shop</a></h5>
    </body>
    <?php
}
?>

</html>
