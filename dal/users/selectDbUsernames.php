<?php

require './dal/getConnection.php';

$query = /** @lang text */
    'SELECT * FROM `users`';
$prep = $pdo->prepare($query);
$prep->execute();
$users = $prep->fetchAll();