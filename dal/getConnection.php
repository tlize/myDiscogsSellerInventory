<?php

try {
    $dsn = 'mysql:host=localhost:3306;dbname=discogs';
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    $pdo = new PDO($dsn, 'tristan', 'aime35!', $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $msg = 'PDO ERROR in ' . $e->getFile() . ' : ' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
}


