<?php
session_start();
//Se connecter à la BDD

echo 'test';
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

// Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO cursus(num_etu, label_cursus) VALUES(:num_etu, :label_cursus)');
    $req->execute(array(
        'num_etu' => $_SESSION['num_etu'],
        'label_cursus' => $_POST['label_cursus']
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//echo $_SESSION['label_cursus'];
//echo $_SESSION['num_etu'];
// Redirection du visiteur vers la page des cursus
header("Location: $_SERVER[HTTP_REFERER]" );
exit;
?>