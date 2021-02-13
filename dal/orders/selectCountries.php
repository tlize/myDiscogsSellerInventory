<?php

require_once './dal/getConnection.php';

$order = 'orders_nb';
$sort = 'desc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    "SELECT country, COUNT(order_num)'orders_nb', SUM(total)'orders_total', ROUND(AVG(total), 2)'avg' FROM `orders` GROUP by country
 ORDER BY " . $order . ' ' . $sort;
$pdo_select = $pdo->prepare($query);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();

