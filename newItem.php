<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New Item</title>
    <link rel="icon" href="inc/img/technology.png">
    <link rel="stylesheet" href="inc/css/myStyle.css">
    <link rel="stylesheet" href="inc/bootstrap/bootstrap.css">
    <script src="inc/bootstrap/jquery-3.5.1.js"></script>
    <script src="inc/bootstrap/bootstrap.js"></script>
</head>

<body>
<div class="container-fluid">
    <?php require_once './inc/template/header.php';
    if (isset($auth_user)) {

        ?>
        <h4>New Item in my Store !</h4>
        <form id="newItem" action="insertInDataBase.php" method="POST">
            <div class="row">
                <div class="col-lg-4 container-fluid">
                    <div>
                        <label for="listing_id">Listing Id :</label>
                        <input id="listing_id" type="number" class="form-control" name="listing_id" required>
                    </div>
                    <div>
                        <label for="artist">Band / Artist :</label>
                        <input id="artist" type="text" class="form-control" name="artist" required>
                    </div>
                    <div>
                        <label for="title">Title :</label>
                        <input id="title" type="text" class="form-control" name="title" required>
                    </div>
                    <div>
                        <label for="format">Format :</label>
                        <input id="format" type="text" class="form-control" name="format" required>
                    </div>
                    <div>
                        <label for="label">Label :</label>
                        <input id="label" type="text" class="form-control" name="label" required>
                    </div>
                    <div>
                        <label for="catno">Catno :</label>
                        <input id="catno" type="text" class="form-control" name="catno" required>
                    </div>
                </div>
                <div class="col-lg-4 container-fluid">
                    <div>
                        <label for="release_id">Release Id :</label>
                        <input id="release_id" type="number" class="form-control" name="release_id" required>
                    </div>
                    <div>
                        <label for="price">Price :</label>
                        <input id="price" type="number" class="form-control" name="price" required>
                    </div>
                    <div>
                        <label for="media_condition">Media Condition :</label>
                        <select id="media_condition" class="form-control" name="media_condition" required>
                            <option value="">Select Item Condition</option>
                            <option value="Mint (M)">Mint (M)</option>
                            <option value="Near Mint (NM or M-)">Near Mint (NM or M-)</option>
                            <option value="Very Good Plus (VG+)">Very Good Plus (VG+)</option>
                            <option value="Very Good (VG)">Very Good (VG)</option>
                            <option value="Good Plus (G+)">Good Plus (G+)</option>
                            <option value="Good (G)">Good (G)</option>
                            <option value="Fair (F)">Fair (F)</option>
                            <option value="Poor (P)">Poor (P)</option>
                        </select>
                    </div>
                    <div>
                        <label for="sleeve_condition">Sleeve Condition :</label>
                        <select id="sleeve_condition" class="form-control" name="sleeve_condition">
                            <option value="" selected>Not Graded</option>
                            <option value="Mint (M)">Mint (M)</option>
                            <option value="Near Mint (NM or M-)">Near Mint (NM or M-)</option>
                            <option value="Very Good Plus (VG+)">Very Good Plus (VG+)</option>
                            <option value="Very Good (VG)">Very Good (VG)</option>
                            <option value="Good Plus (G+)">Good Plus (G+)</option>
                            <option value="Good (G)">Good (G)</option>
                            <option value="Fair (F)">Fair (F)</option>
                            <option value="Poor (P)">Poor (P)</option>
                        </select>
                    </div>
                    <div>
                        <label for="comments">Comments :</label>
                        <textarea id="comments" class="form-control" name="comments" rows="4"></textarea>
                    </div>
                </div>
                <input name="status" type="hidden" value="For Sale">
                <input name="listed" type="hidden" value="<?php echo date('Y-m-d H:i:s') ?>">
            </div>
            <br>
            <input class="form-control" type="submit" name="ok" value="Insert New Item in Inventory">
        </form>

        <?php

    } else {
        echo 'sorry you can\'t !';
    }
    ?>


</div>
</body>
