<?php

require_once './dal/getConnection.php';

$queryS = /** @lang text */
    'SELECT * FROM temp';
$pdo_select = $pdo->prepare($queryS);
$pdo_select->execute();
$rowAll = $pdo_select->fetchAll();