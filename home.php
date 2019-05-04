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
    <title>Document</title>
</head>
<body>
    <div class="homeBox">    
        <a href="profile.php">Your profile</a>
        <a href="account.php">Change account</a>
        <a href="settings.php">profile settings</a>
        <a href="password.php">Change password</a>
        <a href="logout.php">logout</a>
    </div>
</body>
</html>
<?php 
         if(isset($_SESSION["loginSuccess"])){
            echo "<p>welcome ".$_SESSION['userName']."</p><br>".$_SESSION["loginSuccess"];
         }

?>