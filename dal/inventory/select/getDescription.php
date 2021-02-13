<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'SELECT * FROM inventory WHERE listing_id = ?';

$prep = $pdo->prepare($query);
$prep->bindParam(1, $id);
$prep->execute();
$arr = $prep->fetch();
$description = $arr['artist'] . ' - ' . $arr['title'] . ' (' . $arr['format'] . ')';
$price = $arr['price'];