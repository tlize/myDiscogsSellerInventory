<?php

require_once './dal/getConnection.php';

$order = 'title';
$sort = 'asc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    'SELECT *, CONVERT (price, decimal)price_dec FROM inventory WHERE artist LIKE ? ORDER BY ' . $order . ' ' . $sort;
$prep = $pdo->prepare($query);
$prep->bindValue(1, $_GET['artist']);
$prep->execute();
$rowAll = $prep->fetchAll();