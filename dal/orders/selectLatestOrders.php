<?php

require_once './dal/getConnection.php';

$queryO = /** @lang text */
    'SELECT *, COUNT(oi.item_id)items_nb, CONVERT(total, decimal)total_amount FROM orders o JOIN order_items oi ON
    o.order_num = oi.order_num GROUP BY o.order_num ORDER BY o.order_date DESC LIMIT 10
';
$stmtO = $pdo->query($queryO);
$arrAllO = $stmtO->fetchAll();
