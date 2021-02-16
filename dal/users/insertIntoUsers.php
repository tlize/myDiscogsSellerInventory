<?php

$register_date = date('Y-m-d H:i:s');

require './dal/getConnection.php';

$query = /** @lang text */
    'INSERT INTO users(username, password, register_date, admin) VALUES (?,?,?, 0);';
$prep = $pdo->prepare($query);
$prep->bindParam(1, $username);
$prep->bindParam(2, $password);
$prep->bindParam(3, $register_date);
$prep->execute();

require_once './index.php';
