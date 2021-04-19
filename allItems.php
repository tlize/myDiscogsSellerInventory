<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Inventory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
    <script src="inc/js/sorttable.js"></script>
</head>

<?php
require_once 'dal/inventory/select/selectAllItems.php';
$rowNb = count($rowAll);
?>

<body>
<div id="allItems" class="container-fluid">
    <?php require_once './inc/template/header.php';


    if (isset($auth_user)) {

        if ($rowNb == 0) {
            ?>
            <h4>No item found !</h4><?php
        } else {
            ?>
            <h4><?php echo $rowNb; ?> items in Inventory

                <?php if (isset($search)) {
                    echo ' containing \'' . $question . '\' in \'' . $cat . '\' field';
                }
                ?>

            </h4>
            <table class="table table-hover table-striped sortable">
                <thead class="thead-dark">
                <tr>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <th>Discogs Id</th>
                        <th>Catalog #</th>
                        <?php
                    }
                    ?>
                    <th>Band / Artist</th>
                    <th>Title</th>
                    <th>Label</th>
                    <th>Format</th>
                    <?php
                    if (isset($super_admin)) {
                        ?>
                        <th>Comments</th>
                        <th>Status</th>
                        <th>Price</th>
                        <?php
                    }
                    ?>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($rowAll as $row) {

                    ?>
                    <tr>
                        <?php
                        if (isset($super_admin)) {
                            if ($row['status'] == 'For Sale' && isset($super_admin)) {
                                ?>
                                <td><a href="draft.php?listing_id=<?php echo $row['listing_id'] ?>"
                                       title="Draft"
                                       onclick="return(confirm('<?php echo $row['title'] . ' : Draft in DataBase ?'; ?>'))"
                                    ><?php echo $row['listing_id']; ?></a></td>
                                <?php
                            } else {
                                ?>
                                <td><?php echo $row['listing_id']; ?></td>
                                <?php
                            }
                            ?>
                            <td><?php echo $row['catno']; ?></td>
                            <?php
                        }
                        ?>
                        <td><?php echo $row['artist']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><a href="labelDetails.php?label=<?php echo $row['label'] ?>
                           " title="see all items">
                                <?php echo $row['label']; ?></a></td>
                        <td><?php echo $row['format']; ?></td>
                        <?php


                        if (isset($super_admin)) {
                            ?>
                            <td><?php echo $row['comments']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['price_dec']; ?> €</td>
                            <?php
                        }
                        ?>


                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        }

    } else {
        echo '<br><br><h6>sorry you can\'t !</h6>';
    }

    ?>
</div>
</body>
</html>