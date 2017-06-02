<?php
session_start();

// On récupère le nombre de lignes cad d'élements de notre cursus
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    // ATTENTION !!!! A MODIFIER POUR QUE CE SOIT BIEN POUR LE CURSUS
    $reponse2 = $bdd->query('SELECT count(*)as nb FROM element_formation');
    $donnees2 = $reponse2->fetch();
    $nb_lignes = $donnees2['nb'];
    $reponse2->closeCursor();
    //$reponse2->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//On découpe le nom et le prénom
$nom_et_prenom = $_SESSION['nom'];
$couper = explode(" ", $nom_et_prenom);
$nom = $couper[0];
$prenom = $couper[1];

//On définit le type de fichier
header("Content-Type: text/csv; charset=UTF-8");
//Nom du fichier ==> A modifier en fonction de la personne
header('Content-disposition: attachment; filename="'.$nom_et_prenom.'_export.csv"');

// Création de la ligne d'en-tête
$entete = array("ID", $_SESSION['num_etu'], "", "", "", "", "", "", "", "");

// Création du contenu du tableau
$lignes = array();
//Données étudiantes
$lignes[] = array("NO", $nom, "", "", "", "", "", "", "", "");
$lignes[] = array("PR", $prenom, "", "", "", "", "", "", "", "");
$lignes[] = array("AD", $_SESSION['admi'], "", "", "", "", "", "", "", "");
$lignes[] = array("FI", $_SESSION['filiere'], "", "", "", "", "", "", "", "");
$lignes[] = array("==", "s_seq", "s_label", "sigle", "categorie", "affectation", "utt", "profil", "credit", "resultat");

//Données des cours suivi par l'étudiant
for ($i = 1; $i <= $nb_lignes; $i++) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        // ATTENTION !!!! A MODIFIER POUR QUE CE SOIT BIEN POUR LE CURSUS
        //$reponse2 = $bdd->query('SELECT  FROM element_formation');
        $donnees2 = $reponse2->fetch();
        $nb_lignes = $donnees2['nb'];
        $reponse2->closeCursor();
        $lignes[] = array("EL", "", "", "", "", "", "", "", "", "");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
}
$lignes[] = array("END", "", "", "", "", "", "", "", "", "");


$separateur = ";";

// Affichage de la ligne de titre, terminée par un retour chariot
echo implode($separateur, $entete) . "\r\n";

// Affichage du contenu du tableau
foreach ($lignes as $ligne) {
    echo implode($separateur, $ligne) . "\r\n";
}
?>