<?php 

require_once "../database-manipulation/database-connection.php";

$sql = $pdo->prepare("SELECT * FROM members");
$sql1 = $pdo->prepare("SELECT * FROM activities");
$sql2 = $pdo->prepare("SELECT * FROM reservations");

$nbm = $pdo->prepare("SELECT COUNT(*) FROM members");
$nba = $pdo->prepare("SELECT COUNT(*) FROM activities");
$nbr = $pdo->prepare("SELECT COUNT(*) FROM reservations");


   $sql->execute();
   $sql1->execute();
   $sql2->execute();

   $nbm->execute();
   $nba->execute();
   $nbr->execute();

   
   $result = $sql->fetchAll(PDO::FETCH_ASSOC);

   $activities = $sql1->fetchAll(PDO::FETCH_ASSOC);

   $reservations =  $sql2->fetchAll(PDO::FETCH_ASSOC);

   $nbmembers = $nbm->fetchColumn();
   $nbactivities = $nba->fetchColumn();
   $nbreservations = $nbr->fetchColumn();

   $sql = null;
   $sql = null;
   $sql2 = null;
   ?>

