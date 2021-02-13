<?php

require_once './dal/getConnection.php';

$order = 'title';
$sort = 'asc';
require_once 'bll/sortTable.php';

$query = /** @lang text */
    'SELECT *, CONVERT (price, decimal)price_dec FROM inventory WHERE label LIKE ? ORDER BY ' . $order . ' ' . $sort;
$prep = $pdo->prepare($query);
$prep->bindvalue(1, $_GET['label']);
$prep->execute();
$rowAll = $prep->fetchAll();