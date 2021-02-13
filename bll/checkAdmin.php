<?php

function check_admin($auth_user)
{

    $admin = '';
    require_once './dal/users/selectAdminUsername.php';

    $super_admin = $admin[0]['username'];

    if ($auth_user === $super_admin) {
        return true;
    } else {
        return false;
    }
}