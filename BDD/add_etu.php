<?php
include("connexion.php");
connexion();

$sql = "INSERT INTO mabase(id,nom,prenom,age) ";
$sql .= "VALUES('','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['age']."')";
    
mysql_query($sql) or die(mysql_error());
?>