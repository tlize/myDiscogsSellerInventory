<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Item in Inventory</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './inc/template/header.php';

if (isset($super_admin)) {
    require_once './dal/inventory/insertIntoInventory.php';
}
else {
?>
<body>
<br><br>
<h5>sorry, no insert into database !</h5>
</body>
<?php
}


