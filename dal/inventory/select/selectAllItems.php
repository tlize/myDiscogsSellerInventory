<?php

require_once './dal/getConnection.php';

$order = 'artist';
$sort = 'asc';
require_once 'bll/sortTable.php';

if (isset($search)) {
    $query = /** @lang text */
        'SELECT *, CONVERT (price, decimal)price_dec FROM inventory ' . $search . ' ORDER BY ' . $order . ' ' . $sort;
} else
    $query = /** @lang text */
        'SELECT *, CONVERT (price, decimal)price_dec FROM inventory ORDER BY ' . $order . ' ' . $sort;

$prep = $pdo->prepare($query);
$prep->execute();
$rowAll = $prep->fetchAll();




