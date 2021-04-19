<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Label | details</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/inventory/select/selectLabelDetail.php';
require_once 'bll/getSort.php';
?>

<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {

        ?>
        <br>
        <h4>Label : <?php echo $_GET['label']; ?></h4>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th><a href="?label=<?php echo $_GET['label']; ?>&orderBy=title<?php getLabelDetailSort('title'); ?>"
                       title="Sort by title">Title</a></th>
                <th><a href="?label=<?php echo $_GET['label']; ?>&orderBy=artist<?php getLabelDetailSort('artist'); ?>"
                       title="Sort by artist">Band / Artist</a></th>
                <th>Format</th>
                <th>Status</th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th>
                    <a href="?label=<?php echo $_GET['label']; ?>&orderBy=price<?php getLabelDetailSort('price'); ?>"
                       title="Sort by price">Price</a></th><?php
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
                    <td><a href="artistDetail.php?artist=<?php echo $row['artist'] ?>
                               " title="see all items">
                            <?php echo $row['artist']; ?></a>
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
        echo '<br><br><h6>sorry you can\'t !</h6>';
    }
    ?>

</div>
</body>
