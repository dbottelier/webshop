<?php
/**
 * Created by PhpStorm.
 * User: delan
 * Date: 20-11-2018
 * Time: 09:02
 */
$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "webshop";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
