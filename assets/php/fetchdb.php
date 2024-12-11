<?php 

require_once "../database-manipulation/database-connection.php";

$sql = $pdo->prepare("SELECT * FROM members");
   
   $sql->execute();
   $result = $sql->fetchAll(PDO::FETCH_ASSOC);
   $sql = null;
      ?>

