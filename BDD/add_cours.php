<?php

//include("Connexion_BDD.php");
//connexion();
//$sql = "INSERT INTO Base_etu(id,nom,prenom,age) ";
//$sql .= "VALUES('','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['age']."')";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    echo'test';

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO element_formation(sigle, affectation, categorie, utt) VALUES(:sigle, :affectation, :categorie, :utt)');
$req->execute(array(
    'sigle' => $_POST['sigle'],
    'affectation' => $_POST['affectation'],
    'categorie' => $_POST['categorie'],
    'utt' => $_POST['utt']
));



} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page nommée anciens_cours
//header('Location: ../Etudiant/Anciens_cours.php');

//Redirection vers la page précédente (marchera dans le cas ou on veut ajouter un cours "à l'arrache / proprement)
header ("Location: $_SERVER[HTTP_REFERER]" );
?>