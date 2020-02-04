<link rel="stylesheet" type="text/css" href="CSS/form.css">
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
session_start();
$id = (int)$_GET['id'];
include "dbh.inc.php";

$itemNaam = mysqli_real_escape_string($conn, $_POST['itemNaam']);
$itemPrijs = mysqli_real_escape_string($conn, $_POST['itemPrijs']);
$itemPics = mysqli_real_escape_string($conn, $_POST['itemPics']);

if (empty($itemNaam) || empty($itemPrijs)) {
    header("Location: itemsaanpassen.php?login=emptyfields");
    echo "empty";
    exit();
} else {

    $sql = "UPDATE products SET productNaam='$itemNaam', prijs='$itemPrijs', pics='$itemPics' WHERE productID LIKE '$id'";
    mysqli_query($conn, $sql);

    header("Location: index.php?aanpassen-succes");
    exit();
}


