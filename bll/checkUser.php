<?php

$username_post = $_POST['username'];
$password_post = $_POST['password'];

require './dal/users/selectUserPassword.php';

if ($arr == null) {

    echo 'not registered !';

} else {

    $dbPassword = $arr['password'];
    $logDecrypt = password_verify($password_post, $dbPassword);

    if ($logDecrypt == true) {

        $auth_user = $username_post;
        $_SESSION['auth_user'] = $auth_user;

        require 'bll/checkAdmin.php';

        if (check_admin($auth_user)) {
            $super_admin = $auth_user;
            $_SESSION['super_admin'] = $super_admin;
        }

        echo '<h3>Welcome ' . $auth_user . ' !</h3>';

    } else {

        echo 'forgot your password ?';

    }
}
