<?php
$server = "localhost";
$dbname = "systemdb";
$username = "root";
$password = "karim@mysql@25";

try{

   $pdo = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  
}
catch(PDOException $exception){
   echo "connection failed"."<br>". $exception->getMessage();
}
?>