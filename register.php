<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            <p>First name</p><input type="text" id="firstName" name="firstName" required>
            <br>
            <p>Last name</p><input type="text" id="lastName" name="lastName" required>
            <br>
            <p>email</p><input type="text" id="email" name="email" required>
            <br>
            <p>Password</p><input type="password" id="password" name="password" minlength="4" required>
            <br>
            <p>Password confirm</p><input type="password" id="passwordConf" name="passwordConf" minlength="4" required>
            
            <?php session_start(); echo "<p>".$_SESSION['errorRegistration']."</p>"; $_SESSION['errorLogin'] = "";?>
            <button type="submit" id="registerButton" name="registerButton">register</button><input type="checkbox" value='false' id="checkPremium" name="checkPremium">Premium

        </form>
        <a class="link" href="login.php">Login</a>
    </div>
</body>
</html>