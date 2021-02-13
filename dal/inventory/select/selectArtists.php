<?php

require_once './dal/getConnection.php';

$order = 'total';
$sort = 'desc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    "SELECT artist, COUNT(listing_id)'items', SUM(CONVERT (price, decimal))'total'
    FROM inventory WHERE status = 'Sold' GROUP BY artist
    ORDER BY " . $order . ' ' . $sort;
$pdo_select = $pdo->prepare($query);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();