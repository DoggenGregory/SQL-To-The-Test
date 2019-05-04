<?php
    require "header.php";
    if(!isset($_SESSION['loginSuccess'])){header('Location: login.php');}

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
    ?>
    <div class="box">
        <form action="auth.php" class="form" method="post">
            <p>password</p><input type="password" id="password" name="password" required>
            <br>
            <p>password confirm</p><input type="password" id="passwordComfirm" name="passwordConfirm" required>
            <br>
            <button type="submit" id="changePassword" name="changePassword">change password</button>
        </form>
    </div>
</body>
</html>