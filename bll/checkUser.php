<?php

$username_post = $_POST['username'];
$password_post = $_POST['password'];

require_once './dal/users/selectUserPassword.php';

if ($arr == null) {

    echo '<br><br><h6>not registered !</h6>';

} else {

    $dbPassword = $arr['password'];
    $logDecrypt = password_verify($password_post, $dbPassword);

    if ($logDecrypt == true) {

        $auth_user = $username_post;
        $_SESSION['auth_user'] = $auth_user;

        require_once 'dal/users/selectAllFromUser.php';
        $admin = $user['admin'];

        if ($admin == 1) {
            $super_admin = $auth_user;
            $_SESSION['super_admin'] = $super_admin;
        }

        echo '<h3>Welcome ' . $auth_user . ' !</h3>';

    } else {

        echo '<br><br><h6>forgot your password ?</h6>';

    }
}
