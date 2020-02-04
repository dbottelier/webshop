<?php

session_start();

if (isset($_POST['login'])) {
    include 'dbh.inc.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['wachtwoord']);

    //error handlers
    //Check if inputs are empty

    if (empty($email) || empty($pwd)) {
        header("Location: login.php?login=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            header("location: login.php?login=error");
            exit();
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                //De-hashing password
                $hashedPwdCheck = password_verify($pwd, $row['wachtwoord']);

                if ($hashedPwdCheck == false) {
                    header("location: login.php?login=passworderror");
                    exit();
                } elseif ($hashedPwdCheck == true) {
                    //login user
                    $_SESSION['id'] = $row['userID'];
                    $_SESSION['uid'] = $row['username'];
                    $_SESSION['u_first'] = $row['voornaam'];
                    $_SESSION['u_surname'] = $row['achternaam'];
                    $_SESSION['u_email'] = $row['email'];
                    $_SESSION['admin'] = $row['userIsAdmin'];

                    $_SESSION['winkelwagen']['product'] = array();
                    $_SESSION['winkelwagen']['aantal'] = array();
                    header("location: index.php?login=success1");
                    exit();
                }
            }
        }
    }
}
else {
        header("location: login.php?login=error2");
        exit();
    }
