<?php
session_start();
//Se connecter à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO cursus(resultat, credit, sem_seq, sem_label, label_cursus, affectation, sigle, num_etu) VALUES(:resultat, :credit, :sem_seq, :sem_label, :label_cursus, :affectation, :sigle, :num_etu)');
$req->execute(array(
    //Récupère via le formulaire précédent
    'resultat' => $_POST['resultat'],
    'credit' => $_POST['credit'],
    'sem_seq' => $_POST['sem_seq'],
    'sem_label' => $_POST['sem_label'],
    
    //Comment faire pour creer une var dynamiquement ==> en fonction du num_etu ?
    'sigle' => $_SESSION['sigle'],
    'label_cursus' => $_SESSION['num_etu'],
    'affectation' => $_SESSION['affectation'],
    'num_etu' => $_SESSION['num_etu']
));


// Redirection du visiteur vers la page du minichat
header('Location: ../Etudiant/Anciens_cours.php');
//mysql_query($sql) or die(mysql_error());
?>