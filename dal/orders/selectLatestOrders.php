<?php

require_once './dal/getConnection.php';

$queryO = /** @lang text */
    'SELECT *, CONVERT(total, decimal)total_amount FROM orders ORDER BY order_date DESC LIMIT 10
';
$stmtO = $pdo->query($queryO);
$arrAllO = $stmtO->fetchAll();
