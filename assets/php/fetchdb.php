<?php 

require_once "../database-manipulation/database-connection.php";

$sql = $pdo->prepare("SELECT * FROM members");
$sql1 = $pdo->prepare("SELECT * FROM activities");
$sql2 = $pdo->prepare("SELECT * FROM reservations");

$nbm = $pdo->prepare("SELECT coun(*) FROM members");
$nbm = $pdo->prepare("SELECT coun(*) FROM members");
$nbm = $pdo->prepare("SELECT coun(*) FROM members");


   $sql->execute();
   $sql1->execute();
   $sql2->execute();

   $result = $sql->fetchAll(PDO::FETCH_ASSOC);

   $activities = $sql1->fetchAll(PDO::FETCH_ASSOC);

   $reservations =  $sql2->fetchAll(PDO::FETCH_ASSOC);;

   $sql = null;
   $sql = null;
   $sql2 = null;
   ?>

