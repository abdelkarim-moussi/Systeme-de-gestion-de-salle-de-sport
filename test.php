<?php

$servername = "localhost";
$username = "root";
$pass = "karim@mysql@25";
$dbname = "test";


//connection par utilisation de mysqli orienter objet
// $conn = new mysqli($servername,$username,$pass);

// if($conn->connect_error){
// die ("failed" .$conn->connect_error);
// }
// else echo "succéss";
//$conn->close();

//connection par utilisation de mysqli procedural

// $conn = mysqli_connect($servername,$username,$pass);

// if(!$conn){
//     echo "failed" .mysqli_connect_error();
// }
 
// echo "succéss";
//mysqli_close();


//connection par utilisation de PDO

try{
    $pdoConnection = new PDO("mysql:host=$servername;dbname=$dbname",$username,$pass);

    $pdoConnection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    //INSERT Users
    // $sql ="INSERT INTO users(name,email) 
    // VALUES('JHON','DOE')";
    // $delete = "DELETE FROM users WHERE id != 1";
    // $pdoConnection ->exec($delete);

    // $pdoConnection->exec($sql);    

    //SELECT users
    $users = $pdoConnection->prepare("SELECT * FROM users");
    $users->execute(); 

    $result = $users->fetchALl(PDO::FETCH_ASSOC);

    foreach($result as $val){
        echo $val["name"] ."<br>";
        echo $val["email"];
    }

    $pdoConnection = null;

}catch(PDOException $e){
   
    echo "failed" .$e->getMessage();
}



