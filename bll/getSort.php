<?php

// if QUERY_STRING is not empty it will look like 'orderBy=xxx' or 'orderBy=xxx&sort=asc' or 'orderBy=xxx&sort=desc'
// substr() function lets us know which criteria is chosen

function getSort($sort)
{
    if ($_SERVER['QUERY_STRING'] != "") {
        $current = substr($_SERVER['QUERY_STRING'], 8);
        if ($current == $sort . "&sort=desc") {
            echo '&sort=asc';
        } else echo '&sort=desc';
    }
}

// same as getSort() function, but with opposite values
// useful if default $sort in dal query is 'desc'
function getReverseSort($sort)
{
    if ($_SERVER['QUERY_STRING'] != "") {
        $current = substr($_SERVER['QUERY_STRING'], 8);
        if ($current == $sort . "&sort=asc") {
            echo '&sort=desc';
        } else echo '&sort=asc';
    }
}

// the following are useful for details pages, with url like "...?label=xxx"
function getLabelDetailSort($sort)
{
    $query = $_SERVER['QUERY_STRING'];
    $currentSort = substr($query, strlen('label=' . str_replace(' ', '   ', $_GET['label'])));
    if ($currentSort == "") echo '&sort=asc';
    elseif ($currentSort == '&orderBy=' . $sort || $currentSort == '&orderBy=' . $sort . '&sort=asc') echo '&sort=desc';
}

function getArtistDetailSort($sort)
{
    $query = $_SERVER['QUERY_STRING'];
    $currentSort = substr($query, strlen('artist=' . str_replace(' ', '   ', $_GET['artist'])));
    if ($currentSort == "") echo '&sort=asc';
    elseif ($currentSort == '&orderBy=' . $sort || $currentSort == '&orderBy=' . $sort . '&sort=asc') echo '&sort=desc';
}

function getCountryDetailSort($sort)
{
    $query = $_SERVER['QUERY_STRING'];
    $currentSort = substr($query, strlen('country=' . str_replace(' ', '   ', $_GET['country'])));
    if ($currentSort == "") echo '&sort=desc';
    elseif ($currentSort == '&orderBy=' . $sort || $currentSort == '&orderBy=' . $sort . '&sort=desc') echo '&sort=asc';
}