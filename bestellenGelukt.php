<html>
<body>
<p>Bestelling Gelukt!</p>
</body>
</html>

<?php
session_start();
include "dbh.inc.php";

echo 'aantal is: ' .$_SESSION['aantalwinkelwagen'];

?>