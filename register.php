<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myDiscogsApp / Register</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>
<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php'; ?>
    <div class="row">
        <div class="col-lg-4 container-fluid">
            <form id="login" action="index.php" method="POST">
                <h4>Enter User Info</h4><br>
                <div id="username">
                    <div>
                        <label for="username">Username :</label>
                    </div>
                    <div>
                        <input id="username" type="text" class="form-control" name="username" pattern="^[A-Za-z0-9_-]+$"
                               minlength="4" maxlength="20" title="letters | numbers | - | _" required/>
                    </div>
                </div>
                <div id="email">
                    <div>
                        <label for="email">Email :</label>
                    </div>
                    <div>
                        <input id="email" type="email" class="form-control" name="email"
                               pattern="^[A-Za-z0-9]+@{1}[A-Za-z]+\.{1}[A-Za-z]{2,}$"
                               maxlength="25"/>
                    </div>
                </div>
                <div id="password">
                    <div>
                        <label for="password">Password :</label>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password"
                               pattern="^[A-Za-z0-9_-!?]+$"
                               minlength="8" maxlength="30" title="letters | numbers | - | _ | ! | ?" required/>
                    </div>
                </div>
                <div id="password_confirm">
                    <div>
                        <label for="password_confirm">confirm Password :</label>
                    </div>
                    <div>
                        <input id="password_confirm" type="password" class="form-control" name="password_confirm"
                               minlength="8" pattern="^[A-Za-z0-9_-!?]+$" maxlength="30"
                               title="letters | numbers | - | _ | ! | ?" required/>
                    </div>
                </div>
                <br>
                <input type="hidden" name="register_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <input class="form-control" type="submit" name="register" value="Register"/>
            </form>
        </div>
    </div>
</div>
</body>
