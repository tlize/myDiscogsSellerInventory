<?php

session_start();

if (isset($_SESSION['auth_user'])) {
    $auth_user = $_SESSION['auth_user'];
}

if (isset($_SESSION['super_admin'])) {
    $super_admin = $_SESSION['super_admin'];
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['login'])) {
    require 'bll/checkUser.php';
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_confirm']) && isset($_POST['register'])) {
    require 'bll/signIn.php';
    register();
}

if (isset($_GET['logout'])) {
    session_destroy();
    if (isset($auth_user)) {
        unset($auth_user);
    }
    if (isset($super_admin)) {
        unset($super_admin);
    }
}

if (isset($_GET['more'])) {
    echo '
        <div id="more">
            <p>as a learning Web developer, and a Discogs seller, I wanted to play with my DB and update it at each new order</p>
            <p>in the beginning my tables were : "inventory", "orders_items", "orders", after the CSV files</p>
            <p>I had to change a few settings in the DB, such as some fields length, and add a "country" field to make more stats</p>
            <p>some columns I didn\'t need have been deleted</p>
            <p>a function had to be created to set buyer\'s country by copying/pasting his shipping address in the form</p>
            <p>also, I created the "temp" table which made my work easier to set many items \'Sold\' all at once</p>
            <p>last table I had to create was the "users" one, before deploying this app, for the minimum required security</p>
            <p>(i.e. so that anyone can\'t changes values in my DB)</p>
            <p>next step : allow everyone to upload his csv files and browse his own seller stats</p>
            <p>or perhaps make it possible to connect with discogs account and directly access seller stats through Discogs API</p>
            <p>certainly will use a framework for this purpose, such as Symfony for exemple </p>
            <p>unless I build this app again from scratch, with a different language / techno ?</p>
            <p>...working on it, maybe when I get my graduation and have a little more time</p>
        </div>
            ';
}

if (isset($_GET['search'])) {
    echo '
        <div id="search">
            <form action="./search.php" method="POST">
                <div>
                    <label for="quest"></label>
                    <input id="quest" type="search" class="form-control mr-sm-2" name="quest"
                           placeholder="what is your name ?" required>
                </div>
                <div>
                    <label for="category"></label>
                    <select class="form-control mr-sm-2" id="category" name="category" required>
                        <option value="" selected>what is your quest ?</option>
                        <option value="artist">Band / Artist</option>
                        <option value="title">Title</option>
                        <option value="label">Label</option>';
    if (isset($super_admin)) {
        echo '
                        <option value="comments">Comments</option>';
    }
    echo '
                    </select>
                </div>
                <div>
                    <label for="page"></label>
                    <select class="form-control mr-sm-2" id="page" name="page" required>
                        <option value="" selected>what is your favorite color ?</option>';
    if (isset($auth_user)) {
        echo '
                        <option value="allItems">All Items</option>
                        <option value="sold">Sold Items</option>';
    }

    echo '
                        <option value="forSale">Items For Sale</option>
                    </select>
                </div>
                <br>
                <input class="form-control mr-sm-2" type="submit" name="ok" value="Right, off you go">
            </form>
        </div>
    ';
}

if (isset($_GET['newprice']) && isset($_GET['listingid'])) {
    $listing_id = $_GET['listingid'];

    echo '
        <div id="newprice">
            <form action="updatePrice.php" method="POST" class="form-inline">
                <label for="price">new price : </label>
                <input id="price" type="number" class="form-control mr-sm-2" name="price" required/>
                <input class="form-control mr-sm-2" type="submit" name="ok" value="Update"/>
                <input type="hidden" name="listing_id" value="' . $listing_id . '"/>
            </form>
            </div>
    ';
}

?>


<nav class="navbar navbar-expand navbar-dark bg-dark row">

    <div class="col-lg-1">
        <a id="home_logo" href="./index.php" title="Home"><i class="icon-technology_icon"></i></a>
    </div>

    <div class="col-lg-7">
        <div class="nav-item dropdown navbarLink">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">Menu</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./statusForSale.php">Items For Sale</a>
                <a class="dropdown-item" href="./statusSold.php">Sold items</a>
                <a class="dropdown-item" href="./allItems.php">All items</a>
                <a class="dropdown-item" href="./newItem.php">New item</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="./bestOrders.php">Best orders</a>
                <a class="dropdown-item" href="./bestArtists.php">Best bands / artists</a>
                <a class="dropdown-item" href="./bestLabels.php">Best labels</a>
                <a class="dropdown-item" href="./bestCountries.php">Best countries</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?search">Search</a>
                <?php
                if (isset($super_admin)) {
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="./users.php">All users</a>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-4 navbarLink">
        <?php if (isset($auth_user)) {
            echo $auth_user . ' ';
            ?>
            <a href="./index.php?logout">Logout</a><?php
        } else {
            ?>
            <a href="./login.php">Login</a> or <a href="./register.php">Register</a><?php
        }
        ?>
    </div>

</nav>

<div class="background"></div>

<footer>&copy; <a href="mailto:tlize@tristanlize.fr">tlize</a> <?php echo date('Y') ?></footer>





