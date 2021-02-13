<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Items | Set Sold</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>
<?php
?>
<body>
<div class="container-fluid">
    <?php
    require_once './inc/template/header.php';

    if (isset($auth_user)) {
        ?>
        <h4>Set items Sold :</h4>
        <?php
        $total = 0;
        foreach ($_POST['listing_id'] as $row) {
            $id = $row;
            require './dal/inventory/select/getDescription.php';
            $total += $price;

            if (isset($super_admin)) {
                require './dal/temp/insertIntoTemp.php';
            }

            ?>
            <h4><?php echo $description; ?></h4>
            <?php
        }
        ?>
        <form action="updateManyItems.php" method="POST">
            <div class="row">
                <div class="col-lg-8 container-fluid">
                    <div>
                        <label for="buyer">Buyer :</label>
                        <input id="buyer" class="form-control" type="text" name="buyer" required>
                    </div>
                    <div>
                        <label for="order_num">Order # :</label>
                        <input id="order_num" class="form-control" type="number" name="order_num" required>
                    </div>
                    <div>
                        <label for="shipping_address">Buyer Info :</label>
                        <textarea id="shipping_address" class="form-control" name="shipping_address" rows="8"
                                  required></textarea>
                    </div>
                    <input name="order_date" type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>">
                    <input name="total" type="hidden" value="<?php echo $total ?>">
                    <br>
                    <div>
                        <input class="form-control-lg" type="submit" name="ok" value="Update DataBase">
                    </div>
                </div>
            </div>
        </form>
        <?php
    } else {
        echo 'sorry you can\'t !';
    }

    ?>

</div>
</body>
</html>

    