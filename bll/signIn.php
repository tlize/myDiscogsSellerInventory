<?php


function valid_post($post_data)
{
    $post_data = trim($post_data);
    $post_data = stripslashes($post_data);
    $post_data = htmlspecialchars($post_data);
    $post_data = htmlentities($post_data);
    return $post_data;
}

function register()
{

    if ($_POST['email'] != '') {
        echo 'robots and trolls not welcome !';
    } else {

        $username = valid_post($_POST['username']);
        if (isset($_POST['password']) && isset($_POST['password_confirm']) && $_POST['password'] != '' && $_POST['password_confirm'] != '') {

            $password = valid_post($_POST['password']);
            $password_confirm = valid_post($_POST['password_confirm']);

            if ($password == $password_confirm) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $db_usernames = [];
                $users = [];
                require './dal/users/selectDbUsernames.php';
                if (!$users) {
                    $db_usernames = array();
                } else {
                    foreach ($users as $user)
                        $db_usernames[] = $user['username'];
                }
                if (!in_array($username, $db_usernames) && filter_var($username, FILTER_SANITIZE_STRING)) {

                    require 'dal/users/insertIntoUsers.php';

                    echo '<p>Welcome ' . $username . ' !</p>';
                    echo '<p>Now please <a class="emLink" href="./login.php">login</a></p>';
                } else {
                    echo 'sorry, username already used !';
                }
            } else {
                echo 'please check your password confirm !';
            }
        }
        $register_date = $_POST['register_date'];

    }

}
