<?php
session_start();
$id = $_GET['id'];
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
    <h1>Items Aanpassen</h1>
</header>

<main>
    <form action="itemaanpassen.inc.php?id=<?php echo $id;?>'" method="post">
        Naam Item:<br><br>
        <input type="text" name="itemNaam"><br><br>

        Prijs Item:<br><br>
        <input type="text" name="itemPrijs"><br><br>

        Foto:<br><br>
        <input type="text" name="itemPics"><br><br>

        <input type="submit" value="Aanpassen">
    </form>
</main>
</body>
</html>