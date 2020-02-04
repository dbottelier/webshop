<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="UTF-8">
<meta name="description" content="Webshop">
<meta name="author" content="Delano">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/form.css">
    <link rel="stylesheet" type="text/css" href="CSS/index.css">
</head>
<body>
<header>
    <h1>Items Toevoegen</h1>
</header>

<main>
    <form action="itemstoevoegen.inc.php" method="post">
        Naam Item:<br><br>
        <input type="text" name="itemNaam"><br><br>

        Prijs Item:<br><br>
        <input type="number" min="1" max="9999" name="itemPrijs"><br><br>

        Foto:<br><br>
        <input type="text" name="itemPics"><br><br>

<!--        Catogorie:<br><br>-->
<!--        <select id="catogrieen" width="100">-->
<!--            <option value="keuze 1">Keuze 1</option>-->
<!--            <option value="keuze 2">Keuze 2</option>-->
<!--            <option value="keuze 3">Keuze 3</option>-->
<!--        </select><br><br><br>-->

        <input type="submit" value="Versturen">
    </form>
</main>
</body>
</html>