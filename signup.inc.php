<?php
/**
 * Created by PhpStorm.
 * User: delan
 * Date: 20-11-2018
 * Time: 08:55
 */

if (isset($_POST['signup'])) {

    include_once 'dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    //error handlers
    //no empty fields
    if (empty($first) || empty($surname) || empty($username) || empty($email) || empty($pwd)) {
        header("Location: register.php?signup=empty");
        exit();
    } else {
        //check if input char are valid
        if (!preg_match("/^[a-zA-Z0-9]*$/", $first) || !preg_match("/^[a-zA-Z0-9]*$/", $surname)) {
            header("Location: register.php?signup=invalidchars");
            exit();
        } else {
            //check for valid email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: register.php?signup=emailinvalid");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    header("Location: register.php?signup=usernametaken");
                    exit();
                } else {
                    //hashing password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user into database
                    $sql = "INSERT INTO users (voornaam, achternaam, email, wachtwoord, username) VALUES ('$first', '$surname', '$email', '$hashedPwd', '$username');";
                    mysqli_query($conn, $sql);

                    header("Location: index.php?signup=succes");
                    exit();
                }
            }
        }
    }

} else {
    header("Location: register.php");
    exit();
}