<?php

$price = $_POST['price'];
$listing_id = $_POST['listing_id'];


require_once './dal/getConnection.php';

$query = /** @lang text */
    'UPDATE inventory SET price = ? WHERE listing_id = ?;';

$prep = $pdo->prepare($query);
$prep->bindValue(1, $price);
$prep->bindValue(2, $listing_id);
$prep->execute();


echo 'Updated !';
//require_once './index.php';echo 'newprice : ' . $price .' - listing_id : ' . $listing_id;
