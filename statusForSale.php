<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Items For Sale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
    <script src="inc/js/sorttable.js"></script>
</head>

<?php
require_once './dal/inventory/select/selectForSale.php';
$rowNb = count($rowAll);
?>

<body>
<div id="forSale" class="container-fluid">
    <?php require_once './inc/template/header.php';
    if ($rowNb == 0) {
        ?>
        <h4>No item found !</h4><?php
    } else {
        ?>
        <h4><?php echo(count($rowAll)); ?> items For Sale
            <?php if (isset($search)) {
                echo ' containing \'' . $question . '\' in \'' . $cat . '\' field';
            } ?>
        </h4>
        <form id="setSold" action="confirmManyUpdates.php" method="POST">
            <table class="table table-hover table-striped sortable" style="margin-bottom: 3.5em">
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
                        <?php
                    }
                    ?>
                    <th>Price</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($rowAll as $row) {
                    ?>
                    <tr>
                        <?php
                        if (isset($super_admin)) {
                            ?>
                            <td><a href="confirmUpdate.php?listing_id=<?php echo $row['listing_id'] ?>"
                                   title="set Sold"
                                   onclick="return(confirm('<?php echo $row['title'] . ' : set Sold in DataBase ?'; ?>'))"
                                ><?php echo $row['listing_id']; ?></a></td>
                            <td><?php echo $row['catno']; ?></td>
                            <?php
                        }
                        ?>
                        <td><a href="artistDetail.php?artist=<?php echo $row['artist'] ?>
                               " title="see all items">
                                <?php echo $row['artist']; ?></a></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><a href="labelDetails.php?label=<?php echo $row['label'] ?>
                               " title="see all items">
                                <?php echo $row['label']; ?></a></td>
                        <td><?php echo $row['format']; ?></td>
                        <?php
                        if (isset($super_admin)) {
                            ?>
                            <td><?php echo $row['comments']; ?></td>
                            <?php
                        }
                        ?>
                        <td><a href="?newprice&listingid=<?php echo $row['listing_id']; ?>" title="update price"
                               onclick="return(confirm('<?php echo $row['title'] . ' : set new price ?'; ?>'))"><?php echo $row['price_dec']; ?>
                                €</a></td>
                        <td><input form="setSold" type="checkbox" name="listing_id[]"
                                   value="<?php echo $row['listing_id']; ?>" title="set Sold"/></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </form>
        <?php
    }
    ?>
    <footer>
        <input form="setSold" type="submit" value="set selected items Sold" title="set selected items Sold"
               onclick="return(confirm('Set Sold in DataBase ?'))">
        &copy; <a href="mailto:tlize@tristanlize.fr">tlize</a> <?php echo date('Y') ?>
    </footer>
</div>
</body>
</html>
