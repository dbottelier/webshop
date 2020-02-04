<?php
session_start();
include "dbh.inc.php";

$_SESSION['winkelwagen'];

$userID = $_SESSION['id'];

$aantalWinkelwagen = count($_SESSION['winkelwagen']['product']);
$bestelDatum = date('Y-m-d H:i:s');

$sql = "INSERT INTO orders(userID, bestelling_datum) VALUES ('$userID', '$bestelDatum')";
mysqli_query($conn, $sql);

$last_id = $conn->insert_id;

for($i = 0; $i < $aantalWinkelwagen; $i++){

    $id = $_SESSION['winkelwagen']['product'][$i];
    $aantal = $_SESSION['winkelwagen']['aantal'][$i];

    $sql = "INSERT INTO orderproduct(orderID, productID, aantal) VALUES ('$last_id', '$id', '$aantal')";
    mysqli_query($conn, $sql);
}

unset($_SESSION['winkelwagen']);

$_SESSION['winkelwagen']['product'] = array();
$_SESSION['winkelwagen']['aantal'] = array();




header("Location: index.php?bestelling-gelukt");
exit();

?>