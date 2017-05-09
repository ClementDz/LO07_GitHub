<?php

//include("Connexion_BDD.php");
//connexion();
//$sql = "INSERT INTO Base_etu(id,nom,prenom,age) ";
//$sql .= "VALUES('','".$_POST['nom']."','".$_POST['prenom']."','".$_POST['age']."')";

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
echo'test';

//QUAND ON AJOUTE SEULEMENT 2 ELMT DS 1 TAB A 2 COLONNE CA MARCHE
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO element_formation(sem_seq, sem_label, sigle, affectation, categorie, utt, profil) VALUES(:sem_seq, :sem_label, :sigle, :affectation, :categorie, :utt, :profil)');
$req->execute(array(
    'sem_seq' => $_POST['sem_seq'],
    'sem_label' => $_POST['sem_label'],
    'sigle' => $_POST['sigle'],
    'affectation' => $_POST['affectation'],
    'categorie' => $_POST['categorie'],
    'utt' => $_POST['utt'],
    'profil' => $_POST['profil']
));


// Redirection du visiteur vers la page du minichat
header('Location: ../Etudiant/Anciens_cours.php');
//mysql_query($sql) or die(mysql_error());
?>