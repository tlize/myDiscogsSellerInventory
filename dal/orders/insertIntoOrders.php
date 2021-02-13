<?php
$queryIO = /** @lang text */
    'INSERT INTO orders(buyer, order_num, order_date, total, shipping_address, country)'
    . 'VALUES(?, ?, ?, ?, ?, ?);';

$queryIO = $pdo->prepare($queryIO);
$queryIO->bindValue(1, $buyer);
$queryIO->bindValue(2, $order_num);
$queryIO->bindValue(3, $order_date);
$queryIO->bindValue(4, $total);
$queryIO->bindValue(5, $shipping_address);
$queryIO->bindValue(6, $country);
$queryIO->execute();
