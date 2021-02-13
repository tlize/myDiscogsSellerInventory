<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Best Selling Labels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/inventory/select/selectLabels.php';
require_once 'bll/getSort.php';
?>

<body>
<div id="labels" class="container-fluid">
    <?php require_once './inc/template/header.php';

    if (isset($auth_user)) {

        ?>
        <h4>Best Selling Labels</h4>
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <tr>
                <th><a href="?orderBy=label<?php getReverseSort('label'); ?>" title="Sort by Label">Label</a></th>
                <th><a href="?orderBy=items<?php getReverseSort('items'); ?>" title="Sort by Items">Nb of Items</a></th>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <th><a href="?orderBy=total<?php getReverseSort('total'); ?>" title="Sort by Total">Total</a>
                    </th><?php
                }
                ?>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($rowAll as $row) {
                ?>
                <tr>
                    <td><a href="labelDetails.php?label=<?php echo $row['label'] ?>
                           " title="see all items">
                            <?php echo $row['label']; ?></a></td>
                    <td><?php echo $row['items']; ?></td>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <td><?php echo $row['total']; ?> €</td><?php
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