<?php
session_start();

unset($_SESSION['winkelwagen']);

$_SESSION['winkelwagen']['product'] = array();
$_SESSION['winkelwagen']['aantal'] = array();

header("Location: winkelwagen.php?geleegd");
exit();


?>