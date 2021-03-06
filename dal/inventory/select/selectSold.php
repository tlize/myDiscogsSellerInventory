<?php

require_once './dal/getConnection.php';

$order = 'artist';
$sort = 'asc';
require_once 'bll/sortTable.php';

if (isset($search)) {
    $query = /** @lang text */
        "SELECT *, convert (price, decimal)price_dec FROM inventory WHERE status = 'Sold'" . $search . " ORDER BY " . $order . ' ' . $sort . ", title";
} else
    $query = /** @lang text */
        "SELECT *, CONVERT (price, decimal)price_dec FROM inventory WHERE status = 'Sold' ORDER BY " . $order . ' ' . $sort . ", title";

$pdo_select = $pdo->prepare($query);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();