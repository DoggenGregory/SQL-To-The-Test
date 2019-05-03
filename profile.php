<?php

require "header.php";
$userLog = $_SESSION['userName'];

try{
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $getUserName = $connection->prepare("SELECT user_name,first_name,last_name,premium,email,id 
                                        FROM users where user_name = '$userLog'");
    $getUserName->execute();
    
    $getUser =  $getUserName->fetch();
    echo "<p>user name : ".$getUser['user_name']."</p>"."<br>"."<p>first name : ".$getUser['first_name']."</p>"."<br>"
    ."</p>"."<p> last name : ".$getUser['last_name']."</p>"."<br>"."<p>premium : ".$getUser['premium']."</p>"."<br>"
    ."<p> email : ".$getUser['email']."</p>"."<p> id : ".$_SESSION['id']."</p>";

    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();}


?>