<?php

session_start();

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

    if (isset($_SESSION['nom_etu_a_supp'])) {
        $nometprenom = $_SESSION['nom_etu_a_supp'];
        $couper = explode(" ", $nometprenom);
        $nom = $couper[0];
        $prenom = $couper[1];
        $reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="' . $nom . '" AND prenom="' . $prenom . '"');
        //On récupère le num_etu (pour gérer les homonoymes!)
        $donnees2 = $reponse2->fetchColumn();
        var_dump($donnees2);
        $numeroetudiant = $donnees2;
        //On va supprimer la ligne de l'étu concerné
        $req = $bdd->query('DELETE from etudiant WHERE nom="' . $nom . '" AND prenom="' . $prenom . '" AND num_etu="'.$numeroetudiant.'"') or die(print_r($bdd->errorInfo()));
        
    }

    // Insertion du message à l'aide d'une requête préparée
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page étudiant
header(("Location: ../PagesWeb/page_etudiant.php" ));
//mysql_query($sql) or die(mysql_error());
?>