<?php
session_start();
//Se connecter à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//QUAND ON AJOUTE SEULEMENT 2 ELMT DS 1 TAB A 2 COLONNE CA MARCHE
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO cursus(resultat, credit, sem_seq, sem_label) VALUES(:resultat, :credit, :sem_seq, :sem_label)');
$req->execute(array(
    'resultat' => $_POST['resultat'],
    'credit' => $_POST['credit'],
    'sem_seq' => $_POST['sem_seq'],
    'sem_label' => $_POST['sem_label'],
    
    //Comment faire pour creer une var dynamiquement ==> en fonction du num_etu ?
    //'label_cursus' => $_SESSION['label_cursus'],    
    'affectation' => $_SESSION['affectation'],
    //'sigle' => $_SESSION['sigle'],
    'num_etu' => $_SESSION['num_etu'],
    
));


// Redirection du visiteur vers la page du minichat
header('Location: ../Etudiant/Anciens_cours.php');
//mysql_query($sql) or die(mysql_error());
?>