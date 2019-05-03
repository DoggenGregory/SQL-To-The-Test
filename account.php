

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
$userLog = $_SESSION['userName'];

try{
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $getUserName = $connection->prepare("SELECT user_name,first_name,last_name,premium,email 
                                        FROM users where user_name = '$userLog'");
    $getUserName->execute();
    
    
    $getUser =  $getUserName->fetch();
    echo "<form action='auth.php' method='post'><input name= userName value=".$getUser['user_name'].">"."<br>"."<input name=firstName value=".$getUser['first_name'].">"."<br>"
    ."<input name=lastName value=".$getUser['last_name'].">"."<br>"
    ."<input name=email value=".$getUser['email']."><br><input type=checkbox name=checkPremium value="
    .$getUser['premium'].">Premium<br> <button type=submit name= editSubmit>Edit</button><br>
    <button type=submit name=delAccount>delete account</button></form>";

    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();}


?>


</body>
</html>


