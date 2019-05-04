<?php
   require "header.php";
   
   $id = $_SESSION['id'] ;

if(isset($_POST['registerButton'])){
    $uName = $_POST["userName"];
    $fName = $_POST["firstName"];
    $lName = $_POST["lastName"];
    $email =$_POST["email"];
    $premium = $_POST["checkPremium"];
    $password = $_POST["password"];
    $passwordConf = $_POST["passwordConf"];

    if($premium == on){$premiumState = 1;}else{$premiumState = 0;}

    if($uNam !==""&&$fName!==""&&$lName!==""&&$email!==""&&$password!==""&&$passwordConf!==""){

        try{
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $getUserName = $connection->prepare("SELECT user_name FROM users");
            $getUserName->execute();
            $getUserNameRow =  $getUserName->fetch();
            $checkUserName = $getUserNameRow['user_name'];
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();}

        if($checkUserName == $uName){
            
            $_SESSION['errorRegistration'] = "username already exist";
            header('Location: register.php');
    
        }else{

        if($password == $passwordConf){
            try{
                $password = hash('sha256',$password);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $connection->prepare("INSERT into users (user_name,first_name,last_name,premium,email,password)
                                                values ('$uName','$fName','$lName','$premiumState','$email','$password');"); 
                $stmt->execute();
                $_SESSION["loginSuccess"] = $uName." is created";
                header('Location: home.php');

            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();}

            
        }else{
            $_SESSION['errorRegistration'] = "password is not the same as password confirm";
            header('Location: register.php');
        }
    }
    }else {
        
        $_SESSION['errorRegistration'] = "not al reqeured fields a filled";
        header('Location: register.php');

    }


}else if(isset($_POST['loginButton'])){
    
    $userName = $_POST["userName"];
    $password = hash('sha256',$_POST["password"]);
    
    
    try{
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connection->prepare("SELECT user_name,id, password FROM users 
                                    WHERE user_name = '$userName'");
    $stmt->execute();
    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();}
 
       $row =  $stmt->fetch();
       $checkPass = $row['password'];
        
       echo $checkPass. "__________".$password;

      if($checkPass == $password){
        $_SESSION["loginSuccess"] = "login success";
        $_SESSION["userName"] = $row["user_name"];
         $_SESSION['id'] = $row["id"];

            
        header('Location: home.php');
     }else{
        $_SESSION["loginFailed"] = "user name and password does not exist";            
        header('Location: login.php');
     }
     
    }else if (isset($_POST['editSubmit'])){


            $userLog = $_SESSION['userName'];
            
            $uName = $_POST["userName"];
            $fName = $_POST["firstName"];
            $lName = $_POST["lastName"];
            $email =$_POST["email"];
            $premium = $_POST["checkPremium"];
            $premiumState=0;
            if($premium == 0){$premiumState = 1;}else{$premiumState = 0;}
            
            
            die(print_r($premiumState));


            try{
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $connection->prepare("UPDATE users SET user_name = '$uName',first_name = '$fName',
                                                last_name = '$lName',premium = '$premiumState',email = '$email' WHERE id = '$id'"); 
                $stmt->execute();
                $_SESSION["loginSuccess"] = $uName." is created";
                header('Location: home.php');

            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();}

    }else if(isset($_POST['delAccount'])){
        sleep(5);
        //
    try{
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $connection->prepare("DELETE FROM users WHERE id = '$id'"); 
                $stmt->execute();
                
            }catch(PDOException $e) { echo "Error: " . $e->getMessage();}  
            session_destroy();
            header('Location: home.php');
    

    }else if (isset($_POST['changePassword'])){
        $password = $_POST["password"];
        $passwordConf = $_POST["passwordConfirm"];
        if($password == $passwordConf){
            $password = hash('sha256',$password);
            try{
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $connection->prepare("UPDATE users SET password = '$password' WHERE id = '$id'"); 
                $stmt->execute();
                $_SESSION["loginSuccess"] = "password is changed";
                header('Location: home.php');
    
            }catch(PDOException $e) {
                echo "Error: " . $e->getMessage();}
        }

    }
            
?>