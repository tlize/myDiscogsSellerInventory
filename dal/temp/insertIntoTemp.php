<?php

require_once './dal/getConnection.php';

$queryI = /** @lang text */
    'INSERT INTO temp(item_id, item_price, description) '
    . 'VALUES(?, ?, ?);';
$prepI = $pdo->prepare($queryI);
$prepI->bindParam(1, $id);
$prepI->bindParam(2, $price);
$prepI->bindParam(3, $description);
$prepI->execute();