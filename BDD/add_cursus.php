<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
echo'test';

//QUAND ON AJOUTE SEULEMENT 2 ELMT DS 1 TAB A 2 COLONNE CA MARCHE
// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO cursus(label_cursus, affectation, sigle, num_etu, resultat, credit, sem_seq, sem_label) VALUES(:label_cursus, :affectation, :sigle, :num_etu, :resultat, :credit, :sem_seq, :sem_label)');
$req->execute(array(
    'label_cursus' => $_POST['label_cursus'],
    'affectation' => $_POST['affectation'],
    'sigle' => $_POST['sigle'],
    'num_etu' => $_POST['num_etu'],
    'resultat' => $_POST['resultat'],
    'credit' => $_POST['credit'],
    'sem_seq' => $_POST['sem_seq'],
    'sem_label' => $_POST['sem_label']
));


// Redirection du visiteur vers la page du minichat
header('Location: ../Etudiant/Anciens_cours.php');
//mysql_query($sql) or die(mysql_error());
?>