<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    "SELECT *, CONVERT (price, decimal)price_dec FROM inventory WHERE status NOT IN ('For Sale', 'Sold') ORDER BY artist, title
";
$pdo_select = $pdo->prepare($query);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();


