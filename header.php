<?php
SESSION_start();
$servername = "localhost";
$username = "debian-sys-maint";
$password = "ljXq3ZNpkOWDOsSP";
$dbname = "sql_ex";
try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e) {
    echo "Error: " . $e->getMessage();}


?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="fonts/style.css">
