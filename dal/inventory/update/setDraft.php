<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'UPDATE inventory SET status = \'Draft\' WHERE listing_id = ?;';
$id = $_GET['listing_id'];

$prep = $pdo->prepare($query);
$prep->bindValue(1, $id);
$prep->execute();

echo 'Updated !';
require_once './index.php';