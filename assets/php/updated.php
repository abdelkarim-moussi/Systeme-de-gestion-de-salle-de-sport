<?php 

include "../../database-manipulation/database-connection.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $id = $_GET["id"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
  //---prepare the insert query

     $insert = $pdo->prepare("UPDATE members 
     SET nom = :lastname, prenom = :firstname, email = :email, telephone = :phone
     WHERE id_member = $id
     ");

    $insert->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $insert->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $insert->bindParam(':email',$email,PDO::PARAM_STR);
    $insert->bindParam(':phone',$phone,PDO::PARAM_STR);
    
    $insert->execute();

    echo "
    <script>
    alert('Member updated succefully');
    </script>";
    
  }