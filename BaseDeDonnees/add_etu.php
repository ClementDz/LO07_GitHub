<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8','root','');
    $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, num_etu, admi, filiere, email) VALUES(:nom, :prenom, :num_etu, :admi, :filiere, :email)');
    $req->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'num_etu' => $_POST['num_etu'],
        'admi' => $_POST['admi'],
        'filiere' => $_POST['filiere'],
        'email' => $_POST['email']
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Insertion du message à l'aide d'une requête préparée

// Redirection du visiteur vers la page des étudiants
header ("Location: $_SERVER[HTTP_REFERER]" );
exit;
?>