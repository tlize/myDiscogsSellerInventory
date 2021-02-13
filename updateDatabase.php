<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Item | Update confirm</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php

require 'inc/template/header.php';

if (isset($super_admin)) {
    require_once './dal/getConnection.php';
    require_once('./dal/inventory/update/setOneItemSold.php');

    echo 'Updated !';
    require_once './index.php';
}
else {
?>
<body>
<br><br>
<h5>sorry, no updating !</h5>
<h5>if you feel like buying this item, go to <a class="emLink" href="https://www.discogs.com/seller/tlize/profile"
                                                target="_blank">my Discogs shop</a></h5>
</body>
<?php
}




