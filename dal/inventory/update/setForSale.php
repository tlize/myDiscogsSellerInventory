<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'UPDATE inventory SET status = \'For Sale\' WHERE listing_id = ?;';
$id = $_GET['listing_id'];

$prep = $pdo->prepare($query);
$prep->bindValue(1, $id);
$prep->execute();

echo '<br><br><h6>Updated !</h6>';
require_once './index.php';