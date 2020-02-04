<link rel="stylesheet" type="text/css" href="CSS/form.css">
<link rel="stylesheet" type="text/css" href="CSS/index.css">
<style>
    input[type=submit] {
        background: rgba(5, 173, 114, 0.7);
        height: 40px;
        width: 200px;
        border: none;
        border-radius: 15px;
        font-family: "tekno", "sans-serif";
        font-size: 32px;
    }
    h3{
        padding-top: 40px;
        margin-bottom: -15px;
    }
</style>
<!DOCTYPE html>

<html>

<head>

</head>

<body>


<form class="signup-form" action="signup.inc.php" method="post">
    <h3>Name: </h3><br>
    <input type="text" name="first"><br><br>

    <h3>Surname: </h3><br>
    <input type="text" name="surname"><br><br>

    <h3>Username: </h3><br>
    <input type="text" name="username"><br><br>

    <h3>Email: </h3><br>
    <input type="text" name="email"><br><br>

    <h3>Wachtwoord: </h3><br>
    <input type="password" name="password"><br><br>

    <input type="submit" value="Registreren" name="signup">
</form>


</body>
</html>
