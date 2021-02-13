<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    "SELECT * FROM users ORDER BY register_date DESC";

$prep = $pdo->prepare($query);
$prep->execute();
$users = $prep->fetchAll();




