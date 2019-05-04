<?php
    require "header.php";
     
           echo $_SESSION["loginFailed"];          
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="fonts/style.css">
    <title>Document</title>
</head>
<body>
    <?php
        require "header.php";
        if(isset($_SESSION['loginSuccess'])){header('Location: home.php');}

    ?>
    <div class="box">
        <form action="auth.php" class="form" method="post">
            <p>User name</p><input type="text" id="userName" name="userName" required>
            <br>
            <p>Password</p><input type="password" id="password" name="password" required>
            <br>
            <button type="submit" id="loginButton" name="loginButton">login</button>
        </form>
        <a class="link" href="register.php">register</a>
    </div>
</body>
</html>