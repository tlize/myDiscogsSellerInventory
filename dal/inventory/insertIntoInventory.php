<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'INSERT INTO inventory(listing_id, artist, title, label, catno, format,'
    . 'release_id, status, price, listed, comments, media_condition,'
    . 'sleeve_condition) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);;';
$prep = $pdo->prepare($query);
$prep->bindValue(1, $_POST['listing_id']);
$prep->bindValue(2, $_POST['artist']);
$prep->bindValue(3, $_POST['title']);
$prep->bindValue(4, $_POST['label']);
$prep->bindValue(5, $_POST['catno']);
$prep->bindValue(6, $_POST['format']);
$prep->bindValue(7, $_POST['release_id']);
$prep->bindValue(8, $_POST['status']);
$prep->bindValue(9, $_POST['price']);
$prep->bindValue(10, $_POST['listed']);
$prep->bindValue(11, $_POST['comments']);
$prep->bindValue(12, $_POST['media_condition']);
$prep->bindValue(13, $_POST['sleeve_condition']);
$prep->execute();

require_once './index.php';
echo '<p>One more item !</p>';
