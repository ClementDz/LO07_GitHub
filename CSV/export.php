<?php
session_start();

// On récupère le nombre de lignes cad d'élements de notre cursus
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    // ATTENTION !!!! A MODIFIER POUR QUE CE SOIT BIEN POUR LE CURSUS
    $reponse2 = $bdd->query('SELECT COUNT(*) as nb FROM `semestre_element_formation` WHERE `semestre_element_formation`.sem_id IN ( SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu AND `etudiant`.num_etu =  "'. $_SESSION['num_etu'] .'" )');
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
try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        // ATTENTION !!!! A MODIFIER POUR QUE CE SOIT BIEN POUR LE CURSUS

        //Récupération des éléments de la table semestre_element_formation
        $reponse2 = $bdd->query('SELECT * 
                        FROM `semestre_element_formation` 
                        WHERE `semestre_element_formation`.sem_id IN ( SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` 
                        WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu AND `etudiant`.num_etu = "'. $_SESSION['num_etu'] .'" )');
        //Récupération dans la table semestre
        $reponse4 = $bdd->query('SELECT `semestre`.sem_label 
                        FROM `semestre`,`semestre_element_formation`, `cursus`, `etudiant`
                        WHERE `semestre`.sem_id = `semestre_element_formation`.sem_id
                        AND `semestre`.id_cursus = `cursus`.cursus_id
                        AND `cursus`.num_etu = `etudiant`.num_etu 
                        AND `etudiant`.num_etu = "'. $_SESSION['num_etu'] .'" ');
        //Récupération dans la table element_formation
        $reponse3 = $bdd->query('SELECT `element_formation`.affectation, `element_formation`.categorie, `element_formation`.utt 
            FROM `element_formation`,`semestre_element_formation`, `semestre`, `cursus`, `etudiant` 
            WHERE `element_formation`.sigle = `semestre_element_formation`.sigle 
            AND `semestre_element_formation`.sem_id = `semestre`.sem_id 
            AND `semestre`.id_cursus = `cursus`.cursus_id 
            AND `cursus`.num_etu = `etudiant`.num_etu 
            AND `etudiant`.num_etu = "'. $_SESSION['num_etu'] .'"');

            for($i = 1; $i <= $nb_lignes; $i++){
                $donnees2 = $reponse2->fetch();
                $donnees3 = $reponse3->fetch();
                $donnees4 = $reponse4->fetch();

                $sigle = $donnees2['sigle'];
                $resultat = $donnees2['resultat'];
                $credit = $donnees2['credit'];
                $profil = $donnees2['profil'];
                $sem_seq = $donnees2['sem_seq'];

                $categorie = $donnees3['categorie'];
                $affectation = $donnees3['affectation'];
                $utt = $donnees3['utt'];

                $sem_label = $donnees4['sem_label'];


                $lignes[] = array("EL", $sem_seq, $sem_label, $sigle, $categorie, $affectation, $utt, $profil, $credit, $resultat);
            }
            $reponse2->closeCursor();   

    }    
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
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