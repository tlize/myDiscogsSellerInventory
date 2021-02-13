<?php

require_once './dal/getConnection.php';
$query = /** @lang text */
    'DELETE FROM temp';
$pdo->exec($query);
