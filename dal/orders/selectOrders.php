<?php

require_once './dal/getConnection.php';

$order = 'total_amount';
$sort = 'desc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    'SELECT o.order_num, o.order_date, o.buyer, country, COUNT(item_id)\'items_nb\', CONVERT (total, decimal) total_amount
    FROM orders o JOIN order_items oi ON oi.order_num = o.order_num GROUP BY o.order_num
    ORDER BY  ' . $order . ' ' . $sort;
$prep = $pdo->prepare($query);
$prep->execute();
$rowAll = $prep->fetchAll();

