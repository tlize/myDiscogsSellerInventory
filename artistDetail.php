<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Band / Artist | details</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/inventory/select/selectArtistDetail.php';
require_once 'bll/getSort.php';
?>

<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {

        ?>
        <br>
        <h4>Band / Artist : <?php echo $_GET['artist']; ?></h4>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th><a href="?artist=<?php echo $_GET['artist']; ?>&orderBy=title<?php getArtistDetailSort('title'); ?>"
                       title="Sort by Title">Title</a></th>
                <th><a href="?artist=<?php echo $_GET['artist']; ?>&orderBy=label<?php getArtistDetailSort('label'); ?>"
                       title="Sort by Label">Label</a></th>
                <th>Format</th>
                <th>Status</th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th>
                    <a href="?artist=<?php echo $_GET['artist']; ?>&orderBy=price<?php getArtistDetailSort('price'); ?>"
                       title="Sort by Price">Price</a></th><?php
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($rowAll as $row) {
                ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><a href="labelDetails.php?label=<?php echo $row['label'] ?>
                           " title="see all items">
                            <?php echo $row['label']; ?></a></td>
                    <td><?php echo $row['format']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['price_dec']; ?> €</td><?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <?php

    } else {
        echo 'sorry you can\'t !';
    }

    ?>

</div>
</body>
</html>

