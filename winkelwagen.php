<link rel="stylesheet" href="CSS/index.css">
<link rel="stylesheet" href="CSS/form.css">
<?php
session_start();
include "dbh.inc.php";

?>
<style>
    p{
        font-family: "tekno", "sans-serif";
        font-size: 32px;
        margin-bottom: 80px;
        background: rgba(5, 173, 114, 0.7);
        width: 200px;
        height: 40px;
        border-radius: 15px;
        text-align: center;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    table{
        font-family: "arial", "sans-serif";
        border-collapse: collapse;
        border-bottom: black;
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 450px;
    }
    table, tr, td{
        border-bottom: 2px solid black;
        padding: 15px;
        text-align: left;
    }
    form{
        margin-top: 90px;
        color: green;
    }
    input[type=submit]{
        background: rgba(5, 173, 114, 0.7);
        height: 40px;
        width: 200px;
        border: none;
        border-radius: 15px;
        font-family: "tekno", "sans-serif";
        font-size: 32px;
    }
</style>

<?php
echo '<a href="index.php"><p>Terug naar de winkel.</p></a>';

if (!empty($_SESSION['winkelwagen']['product'][0])) {
    foreach ($_SESSION['winkelwagen']['product'] as $productID) {

        //weergeven product ID
        echo "<table align='center'>";
        echo '<tr>';
        echo "<td>ID : " . $productID . "  </td>";

        //aantal zoeken in array en weergeven
        $position = array_search($productID, $_SESSION['winkelwagen']['product']);
        $aantal = $_SESSION['winkelwagen']['aantal'][$position];

        echo "<td> aantal : " . $aantal . "  </td>";

        //naam zoeken in database en weergeven
        $sql = "SELECT * FROM products WHERE productID LIKE '$productID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo "<td> Product: " .$row['productNaam']. '</td>';

        //prijs opzoeken en weergeven
        $sql = "SELECT * FROM products WHERE productID LIKE '$productID'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $itemTotaal = $row['prijs'] * $aantal;
        echo "<td> Prijs: €" .$itemTotaal. "</td>";



        echo "</tr>";
        echo "</table>";

    }

    echo '<br>';
    echo '<form action="mandlegen.php"><input type="submit" value="Lijst leegmaken"> </form>';
    echo '<br><br><br>';
    echo '<form action="bestellen.php"><input type="submit" value="Bestellen"> </form>';
}
?>