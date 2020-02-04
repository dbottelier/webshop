<?php
session_start();
include 'dbh.inc.php';
?>

<! doctype html>
<html>
<meta charset="UTF-8">
<meta name="description" content="Webshop">
<meta name="author" content="Delano">
<title>Webshop</title>

<link rel="stylesheet" type="text/css" href="CSS/index.css">
<link rel="stylesheet" type="text/css" href="CSS/header.css">
<link rel="stylesheet" type="text/css" href="CSS/main.css">
<link rel="stylesheet" type="text/css" href="CSS/footer.css">

<body>

<header>
    <div id="topbar">
        <div id="navigatie">
            <ul>
                <li><a href="contact.php">Contact &nbsp</a></li>
            </ul>
        </div>
        <div id="winkelmand">
            <ul>
                <?php
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {
                    ?>
                    <li><a href="itemstoevoegen.php">Items toevoegen</a></li>
                    <?php
                } elseif (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
                    ?>
                    <li><a href="winkelwagen.php">Winkelwagen</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
        <div id="login">
            <ul>
                <?php
                if (isset($_SESSION['uid'])) {
                    ?>
                    <li>
                        <a href="logout.inc.php">Log-out</a>
                    </li>  <?php
                } else {
                    ?>
                    <li><a href="login.php">Login &nbsp</a></li>
                    <li><a href="register.php">Registreren</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</header>

<main>
    <div id="achtergrondmain">
        <div id="titelitems">
            <?php
            if (isset($_SESSION['uid'])) {
                echo '<p>Producten</p>';
            }
            ?>
        </div>

        <div id="items">
            <?php
            if (isset($_SESSION['uid'])) {
                $sql = "SELECT * FROM products";
                $resultaat = $conn->query($sql);
                if (isset($_SESSION['admin']) && $_SESSION['admin'] == 0) {
                    if ($resultaat->num_rows > 0) {

                        while ($rij = $resultaat->fetch_assoc()) {

                            $id = $rij['productID'];
                            $productNaam = $rij['productNaam'];
                            $prijs = $rij['prijs'];
                            $productPic = $rij['pics'];

                            echo '<div id="item1">';
                            echo '<p>' . $id . '</p>';
                            echo '<h1>' . $productNaam . '</h1>';
                            echo '<img src="' . $productPic . '">';
                            echo '<br><p>€' . $prijs . '</p>';
                            echo '<br><br><a href="add-to-cart.php?id=' . $id . '">Toevoegen aan Winkelwagen</a></div>';
                        }

                    } else {
                        echo '<p>Er zijn nog geen items</p>';
                    }
                } elseif (isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {

                    if ($resultaat->num_rows > 0) {

                        while ($rij = $resultaat->fetch_assoc()) {

                            $id = $rij['productID'];
                            $productNaam = $rij['productNaam'];
                            $prijs = $rij['prijs'];
                            $productPic = $rij['pics'];

                            echo '<div id="item1">';
                            echo '<p>' . $id . '</p>';
                            echo '<h1>' . $productNaam . '</h1>';
                            echo '<img src="' . $productPic . '">';
                            echo '<br><p>€' . $prijs . '</p>';
                            echo '<br><a href="itemverwijderen.php?id=' . $id . '">Item verwijderen</a>';
                            echo '<br><a href="itemaanpassen.php?id=' . $id . '">Item aanpassen</a></div>';
                        }

                    } else {
                        echo '<p>Er zijn nog geen items</p>';
                    }
                }
            } else {
                echo '<p>Welkom op de Homepage.</p> <br>';
                echo '<p>Log in om de producten te bekijken.</p>';
            }


            ?>
        </div>
    </div>
</main>

<footer>
    <div id="socialmedia">
        <ul>
            <li><a href="">FaceBook &nbsp</a></li>
            <li><a href="">Twitter &nbsp</a></li>
            <li><a href="">Youtube &nbsp</a></li>
        </ul>
    </div>
</footer>
</body>
</html>