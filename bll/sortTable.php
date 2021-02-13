<?php

// replaces default $order by the chosen table title
// and default $sort by the one out of the getSort() function

if (isset($_GET['orderBy'])) {
    $order = $_GET['orderBy'];
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}
