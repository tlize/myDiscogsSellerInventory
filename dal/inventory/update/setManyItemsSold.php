<?php

require_once './dal/getConnection.php';

$queryU = /** @lang text */
    'UPDATE inventory SET status = \'Sold\' WHERE listing_id = ?';
$prepU = $pdo->prepare($queryU);
$prepU->bindParam(1, $item_id);
$prepU->execute();

$queryIOI = /** @lang text */
    'INSERT INTO order_items(buyer,order_date, order_num, item_id,'
    . 'item_price, description, shipping_address)'
    . 'VALUES(?, ?, ?, ?, ?, ?, ?);';
$prepIOI = $pdo->prepare($queryIOI);
$prepIOI->bindParam(1, $buyer);
$prepIOI->bindParam(2, $order_date);
$prepIOI->bindParam(3, $order_num);
$prepIOI->bindParam(4, $item_id);
$prepIOI->bindParam(5, $item_price);
$prepIOI->bindParam(6, $description);
$prepIOI->bindParam(7, $shipping_address);
$prepIOI->execute();
