<?php

session_start();
//Se connecter à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO cursus(label_cursus, num_etu) VALUES(:label_cursus, :num_etu)');
    $req->execute(array(
        'label_cursus' => 3,
        'num_etu' => $_SESSION['num_etu']
    ));

    $req = $bdd->prepare('INSERT INTO semestre(sem_seq, sem_label, label_cursus) VALUES(:sem_seq, :sem_label, :label_cursus)');
    $req->execute(array(
        //Récupère via le formulaire précédent
        'sem_seq' => $_POST['sem_seq'],
        'sem_label' => $_POST['sem_label'],
        'label_cursus' => 3
    ));
    
    $req = $bdd->prepare('INSERT INTO semestre_element_formation(sem_id, sigle, resultat, credit, profil) VALUES(:sem_id, :sigle, :resultat, :credit, :profil)');
    $req->execute(array(
        //Récupère via le formulaire précédent
        'sem_id' => 3,
        'resultat' => $_POST['resultat'],
        'credit' => $_POST['credit'],
        'sigle' => $_SESSION['sigle'],
        'profil' => $_POST['profil']
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}




// Redirection du visiteur vers la page du minichat
header('Location: ../Etudiant/Anciens_cours.php');
//mysql_query($sql) or die(mysql_error());
?>