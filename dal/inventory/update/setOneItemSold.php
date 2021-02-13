<?php

//updates inventory table and adds item to order_items table, with order info 
$item_id = $_POST['item_id'];
$queryU = /** @lang text */
    'UPDATE inventory SET status = \'Sold\' WHERE listing_id = ?';

$prepU = $pdo->prepare($queryU);
$prepU->bindValue(1, $item_id);
$prepU->execute();

$buyer = $_POST['buyer'];
$order_date = $_POST['order_date'];
$order_num = $_POST['order_num'];
$item_id = $_POST['item_id'];
$item_price = $_POST['item_price'];
$description = $_POST['description'];
$shipping_address = $_POST['shipping_address'];

$country = null;
require_once 'dal/countries/selectCountriesList.php';
foreach ($countries as $row) {
    $test = strpos($shipping_address, $row['Name']);
    if ($test !== false) {
        $country = $row['Name'];
    }
}

$queryIOI = /** @lang text */
    'INSERT INTO order_items(buyer,order_date, order_num, item_id,'
    . 'item_price, description, shipping_address)'
    . 'VALUES(?, ?, ?, ?, ?, ?, ?);';

$queryIOI = $pdo->prepare($queryIOI);
$queryIOI->bindValue(1, $buyer);
$queryIOI->bindValue(2, $order_date);

// concatenation for the order #, to avoid typing my seller id each time
// not confidential at all, feel free to visit!
// https://www.discogs.com/seller/tlize/profile

$queryIOI->bindValue(3, '1797099-' . $order_num);
$queryIOI->bindValue(4, $item_id);
$queryIOI->bindValue(5, $item_price);
$queryIOI->bindValue(6, $description);
$queryIOI->bindValue(7, $shipping_address);
$queryIOI->execute();

$queryIO = /** @lang text */
    'INSERT INTO orders(buyer, order_num, order_date, total, shipping_address, country)'
    . 'VALUES(?, ?, ?, ?, ?, ?);';

$queryIO = $pdo->prepare($queryIO);
$queryIO->bindValue(1, $buyer);
$queryIO->bindValue(2, '1797099-' . $order_num);
$queryIO->bindValue(3, $order_date);
$queryIO->bindValue(4, $item_price);
$queryIO->bindValue(5, $shipping_address);
$queryIO->bindValue(6, $country);
$queryIO->execute();

