<?php

$server = "localhost";
$dbname = "systemdb";
$username = "root";
$password = "karim@mysql@25";

try{

   $pdo = new PDO("mysql:host=$server;dbname=$dbname",$username,$password);

   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   $sql = $pdo->prepare("SELECT * FROM members");
   
   $sql->execute();
   $result = $sql->fetchAll(PDO::FETCH_ASSOC);

      ?>
      <table>
         <thead>
            <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            </tr>
         </thead>
         <tbody>
         <?php 
            foreach($result as $user){ ?>
            <tr>
              <td>
                  <?php echo $user["nom"]; ?>
              </td>
              <td>
                  <?php echo $user["prenom"]; ?>
              </td>
              <td>
                  <?php echo $user["email"]; ?>
              </td>
              </tr>
            <?php } ?>
           
         </tbody>
      </table>
      <?php
   
   $sql = null;
   $pdo = null;
}
catch(PDOException $exception){
   echo "connection failed"."<br>". $exception->getMessage();
}


