<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    "SELECT CONVERT (total, decimal)total_amount FROM orders WHERE order_num = ?";
$pdo_select = $pdo->prepare($query);
$order_num = $_GET['order_num'];
$pdo_select->bindValue(1, $order_num);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();

