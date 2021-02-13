<?php

require_once 'getConnection.php';

$order = 'o.order_date';
$sort = 'desc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    'SELECT o.order_num, o.buyer, o.order_date, COUNT(item_id)\'items_nb\', CONVERT (total, decimal)total_amount, o.shipping_address
    FROM orders o JOIN order_items oi ON oi.order_num = o.order_num WHERE country LIKE ? GROUP BY o.order_num
    ORDER BY  ' . $order . ' ' . $sort;
$prep = $pdo->prepare($query);
$prep->bindValue(1, $_GET['country']);
$prep->execute();
$rowAll = $prep->fetchAll();