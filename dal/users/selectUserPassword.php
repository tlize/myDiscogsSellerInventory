<?php

require_once './dal/getConnection.php';

$query = /** @lang text */
    'SELECT password FROM users WHERE username = ?';

$prep = $pdo->prepare($query);
$prep->bindParam(1, $username_post);
$prep->execute();
$arr = $prep->fetch();




