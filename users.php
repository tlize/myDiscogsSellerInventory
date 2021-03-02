<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Users</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
    <script src="inc/js/sorttable.js"></script>
</head>

<?php
require_once 'dal/users/selectAllUsers.php';

?>

<body>
<div id="allUsers" class="container-fluid">
    <?php require_once 'inc/template/header.php';

    if (isset($super_admin)) {

        ?>
        <h4>All Users</h4>
        <?php
        foreach ($users as $user) {
            $id = $user['id'];
            $username = $user['username'];
            $password = $user['password'];
            $register_date = $user['register_date'];

            echo '<p>id # ' . $id . ' : <span style="font-weight: bold">' . $username . '</span>, registered on ' . $register_date;
            if ($user['admin'] == 1) echo '<span style="font-weight: bold"> (admin)</span>';
            echo '</p>';

        }
    } else {
        echo 'sorry you can\'t !';
    }

    ?>
</div>
</body>
</html>