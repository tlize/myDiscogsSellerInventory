<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>myDiscogsApp / Login</title>
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
                        <input id="username" type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div id="password">
                    <div>
                        <label for="password">Password :</label>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <br>
                <input class="form-control" type="submit" name="login" value="Login to myDiscogsApp">
            </form>
        </div>
    </div>
</div>
</body>
