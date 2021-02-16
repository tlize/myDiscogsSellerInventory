<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'SELECT * FROM users WHERE username = ?';

$prep = $pdo->prepare($query);
$prep->bindParam(1, $auth_user);
$prep->execute();
$user = $prep->fetch();




