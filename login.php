<link rel="stylesheet" type="text/css" href="CSS/form.css">
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<?php
session_start();

?>
<style>

    form h3{
        padding-top: 40px;
    }
    input [type=text]{
        margin-top: -25px;
    }
    input [type=password]{
        margin-top: -25px;
    }
    input[type=submit]{
        background: rgba(5, 173, 114, 0.7);
        height: 40px;
        width: 200px;
        border: none;
        border-radius: 15px;
        font-family: "tekno", "sans-serif";
        font-size: 38px;
    }


</style>

<!DOCTYPE html>
<html>
<head>

</head>
<body>



<form action="login.inc.php" method="POST">
    <br><br>
    <h3>email:</h3><br>
    <input type="text" name="email"><br><br>
    <h3>wachtwoord:</h3><br>
    <input type="password" name="wachtwoord"><br><br>
    <input type="submit" name="login" value="Login">
</form>

</body>

</html>