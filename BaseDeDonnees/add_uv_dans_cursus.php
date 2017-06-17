<?php

session_start();
//Se connecter à la BDD
    //On récupère le cursus id
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    $reponse = $bdd->query('SELECT cursus_id FROM cursus WHERE num_etu="' . $_SESSION['num_etu'] . '" ');

    while ($donnees = $reponse->fetchcolumn()) {
        var_dump($donnees);
        $cursus_id = $donnees;
    }

        //On affecte id_cursus a cursus_id
    $req = $bdd->prepare('INSERT INTO semestre(sem_label, id_cursus) VALUES(:sem_label, :id_cursus)');
    $req->execute(array(
        'sem_label' => $_POST['sem_label'],
        'id_cursus' => $cursus_id
        ));

        //On va selectionner le bon sem_id de la table semestre pour cet étudiant
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        $reponse = $bdd->query('SELECT sem_id FROM semestre WHERE id_cursus="' . $cursus_id . '" ORDER BY sem_id DESC');
        while ($donnees = $reponse->fetchColumn()) {
            $sem_id = $donnees;
            echo $sem_id;
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

        //On enregistre dans sem_el_f avec sem_id en fonction de précédemment
    $req = $bdd->prepare('INSERT INTO semestre_element_formation(sem_id, sigle, resultat, credit, profil, sem_seq) VALUES(:sem_id, :sigle, :resultat, :credit, :profil, :sem_seq)');
    $req->execute(array(
            //Récupère via le formulaire précédent
        'sigle' => $_POST['mon_UE'],
        'resultat' => $_POST['resultat'],
        'credit' => $_POST['credit'],
        'profil' => $_POST['profil'],
        'sem_seq' => $_POST['sem_seq'],
        'sem_id' => $sem_id
        ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


// Redirection du visiteur vers la page des cursus
header("Location: $_SERVER[HTTP_REFERER]" );
exit;
?>