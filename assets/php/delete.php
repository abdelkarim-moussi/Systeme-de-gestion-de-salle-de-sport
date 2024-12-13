<?php

echo $id;

function delete($id){
    require_once "database-connection.php";
    $sql = $pdo->prepare("DELETE FROM members WHERE $id=id_Member");
    $sql->execute();
}

?>