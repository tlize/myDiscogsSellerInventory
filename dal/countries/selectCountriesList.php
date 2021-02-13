<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'SELECT * FROM countries';
$prep = $pdo->prepare($query);
$prep->execute();
$countries = $prep->fetchAll();


