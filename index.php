<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>my Discogs App</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<?php
require_once './dal/orders/selectLatestOrders.php';
?>

<body id="index">
<div class="container-fluid">

    <?php
    require_once './inc/template/header.php';

    if (isset($auth_user)) {
        ?>
        <br>
        <h4>Latest Orders :</h4>
        <br>
        <?php
        foreach ($arrAllO as $row) {
            $order_date = $row['order_date'];
            ?>
            <h5><a href="orderItems.php?order_num=<?php echo $row['order_num'] ?>" title="see order detail">
                    <?php echo $row['order_num']; ?></a> by <?php
                if (isset($super_admin)) {
                    echo $row['buyer'];
                } else {
                    echo 'xxx';
                }

                ?>
                (<?php echo '<a href="countryDetails.php?country=' . $row['country'] . '">' . $row['country'] . '</a>' ?>
                ) on <?php echo $order_date ?><?php

                $nb_items = $row['items_nb'];
                if (isset($super_admin)) {
                    if ($nb_items == 1) {
                        echo ' : 1 item, ' . $row['total_amount'] . '€';
                    } else {
                        echo ' : ' . $row['items_nb'] . ' items, ' . $row['total_amount'] . '€';
                    }
                } else {
                    if ($nb_items == 1) {
                        echo ' : 1 item';
                    } else {
                        echo ' : ' . $row['items_nb'] . ' items';
                    }
                }
                ?></h5>
            <?php
        }
        require_once './dal/inventory/select/selectDraft.php';

        if ($rowAll) {
            ?>
            <br>
            <h4>Draft or Violation : <?php echo(count($rowAll)); ?> item(s)</h4>
            <table class="table table-sm table-hover table-striped">
                <thead class="thead-dark">
                <tr>
                    <?php if (isset($super_admin)) {
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
                    <?php if (isset($super_admin)) {
                        ?>
                        <th>Price</th>
                        <?php
                    }
                    ?>
                    <th>Status</th>
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
                            <td><a href="backInShop.php?listing_id=<?php echo $row['listing_id'] ?>"
                                   title="set For Sale"
                                   onclick="return(confirm('<?php echo $row['title'] . ' : set For Sale in DataBase ?'; ?>'))"
                                ><?php echo $row['listing_id']; ?></a></td>
                            <td><?php echo $row['catno']; ?></td>
                            <?php
                        }
                        ?>
                        <td><a href="artistDetail.php?artist=<?php echo $row['artist'] ?>" title="see all items">
                                <?php echo $row['artist']; ?></a></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><a href="labelDetails.php?label=<?php echo $row['label'] ?>" title="see all items">
                                <?php echo $row['label']; ?></a></td>
                        <td><?php echo $row['format']; ?></td>
                        <?php
                        if (isset($super_admin)) {
                            ?>
                            <td><?php echo $row['price_dec']; ?> €</td>
                            <?php
                        }
                        ?>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <?php
        }
    } else {
        ?>
        <div>
            <br>
            <h4>Welcome to myDiscogsApp</h4>
            <p>simple, all-php app to make queries in my database, mostly built on CSV files from my Discogs seller
                Inventory (<a class="emLink" href="?more">more</a>)</p>
            <br>
            <p>this page is a kind of preview</p>
            <p>if you just pay a visit you will only see the <a class="emLink" href="statusForSale.php">For Sale
                    page</a></p>
            <p>please <a class="emLink" href="./register.php">register</a> or <a class="emLink"
                                                                                 href="./login.php">login</a> if you
                want to see more</p>
            <p>and feel free to visit my <a class="emLink" href="https://www.discogs.com/seller/tlize/profile"
                                            target="_blank">Discogs shop</a> or <a class="emLink"
                                                                                   href="mailto:tlize@tristanlize.fr">send
                    me a message</a></p>
            <p>interested in dev stuff ? pay a visit to my <a class="emLink"
                                                              href="https://github.com/tlize/myDiscogsSellerInventory"
                                                              target="_blank">GitHub repo</a></p>
        </div>

        <?php
    }
    ?>
</div>
</body>
</html>

