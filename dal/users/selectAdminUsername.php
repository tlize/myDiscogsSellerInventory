<?php

require './dal/getConnection.php';

$query = /** @lang text */
    'SELECT * FROM users WHERE id = 1';
$prep = $pdo->prepare($query);
$prep->execute();
$admin = $prep->fetchAll();
