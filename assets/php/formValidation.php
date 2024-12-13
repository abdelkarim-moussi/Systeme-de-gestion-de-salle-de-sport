<?php
session_start();
 
$_SESSION["success"] = 1;

function formValidation(){
    
    include "../database-manipulation/database-connection.php";
if($_SESSION["success"] = 1){


    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        // Get the form inputs using global POST variables
        $firsName = trim($_POST["firstname"]);
        $lastName = trim($_POST["lastname"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["phone"]);

        // Validate inputs
        $errors = [];

        if (empty($firsName)) {
            $errors[] = "First name is required.";
        }
        if (empty($lastName)) {
            $errors[] = "Last name is required.";
        }
        if (empty($email)) {
            $errors[] = "Email is required.";
        }
        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        }

        // stop execution if an error occurs
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
            return; // Stop further processing if validation failed
        }

        // insert to database if validation success
        try {
            $sql = $pdo->prepare("INSERT INTO members (nom, prenom, email, telephone) VALUES (:nom, :prenom, :email, :telephone)");
            // Bind the sanitized inputs
            $sql->bindParam(':nom', $firsName);
            $sql->bindParam(':prenom', $lastName);
            $sql->bindParam(':email', $email);
            $sql->bindParam(':telephone', $phone);
            
            // Execute the query
            $sql->execute();
            
            $_SESSION["success"] = 0;
            //---stock the last added member in the session variable
            $_SESSION["memberid"] = $pdo->lastInsertId();

             
            echo "Data inserted successfully!"."<br>";
            $sql = null;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $firsName = "";
        $lastName = "";
        $email = "";
        $phone ="";

    }
}
}

formValidation();

?>
