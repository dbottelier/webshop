<?php
session_start();
include'dbh.inc.php';
if($banaan=true){

    $itemNaam = mysqli_real_escape_string($conn, $_POST['itemNaam']);
    $itemPrijs = mysqli_real_escape_string($conn, $_POST['itemPrijs']);
    $itemPics = mysqli_real_escape_string($conn, $_POST['itemPics']);

    if(empty($itemNaam) || empty($itemPrijs)){
        header("Location: itemstoevoegen.php?login=emptyfields");
        echo "empty";
        exit();
    }else{

        $sql = "INSERT INTO products (productNaam, prijs, pics) VALUES ('$itemNaam', '$itemPrijs', '$itemPics');";
        mysqli_query($conn, $sql);

        header("Location: index.php?toevoegensucces");
        exit();
    }

}else{
    echo "error";
    header("Location: index.php?error");
    exit();
}