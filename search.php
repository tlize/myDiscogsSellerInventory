<?php

if (isset($_POST['quest']) && isset($_POST['category']) && isset($_POST['page'])) {
    $question = $_POST['quest'];
    $quest = '\'%' . $question . '%\'';
    $cat = $_POST['category'];
    $page = $_POST['page'];

    switch ($page) :
        case 'allItems' :
            $search = ' WHERE ' . $cat . ' LIKE ' . $quest . ' ';
            require 'allItems.php';
            break;
        case 'sold' :
            $search = ' AND ' . $cat . ' LIKE ' . $quest . ' ';
            require 'statusSold.php';
            break;
        case 'forSale' :
            $search = ' AND ' . $cat . ' LIKE ' . $quest . ' ';
            require 'statusForSale.php';
            break;
    endswitch;
} else {
    require_once 'index.php';
}


