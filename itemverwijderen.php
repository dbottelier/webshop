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

$sql = "DELETE FROM products WHERE productID LIKE '$id'";

if ($conn->query($sql) == TRUE) {
    echo '<p>Item succesvol verwijdered!</p>';
    echo '<br>';
    header("refresh:5;url=index.php");

    echo '<a href="index.php?itemverwijdered"><p>Terug naar de winkel</p></a>';
} else {
    echo 'Iets ging fout';
}



