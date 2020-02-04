<link rel="stylesheet" type="text/css" href="CSS/form.css">
<link rel="stylesheet" type="text/css" href="CSS/index.css">

<style>
    p {
        font-family: "tekno", "sans-serif";
        font-size: 52px;
        background: rgba(5, 173, 114, 0.7);
        width: 450px;
        display: block;
        margin-right: auto;
        margin-left: auto;
        border-radius: 15px;
    }
</style>

<?php
session_start();
$id = (int)$_GET['id'];
include "dbh.inc.php";
$sql = "SELECT * FROM products WHERE productID LIKE productID";

//Kijken of het product al is toegevoegd en anders 1 toevoegen, else: het aantal omhogen
if (in_array($id, $_SESSION['winkelwagen']['product'])) {
    $inArray = array_search($id, $_SESSION['winkelwagen']['product']);
    $_SESSION['winkelwagen']['aantal'][$inArray]++;

    echo '<a href="index.php"><p>Terug naar de hoofdpagina</p></a><br><br>';
    echo '<a href="winkelwagen.php"><p>Naar de winkelwagen</p></a>';


} else {

    array_push($_SESSION['winkelwagen']['product'], $id);
    array_push($_SESSION['winkelwagen']['aantal'], 1);

    $inhoud = $_SESSION['winkelwagen']['aantal'];


    echo '<a href="index.php"><p>Terug naar de hoofdpagina</p></a><br><br>';
    echo '<a href="winkelwagen.php"><p>Naar de winkelwagen</p></a>';

}
?>
