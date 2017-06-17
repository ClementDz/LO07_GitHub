<?php
session_start();
//Se connecter à la BDD

//Page de suppression d'un cursus (entier)
echo $_SESSION['mon_cursus'];
echo $_SESSION['num_etu'];
  

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

    if (isset($_SESSION['mon_cursus'])) {
        $label_cursus = $_SESSION['mon_cursus'];
        $req = $bdd->query("DELETE 
                        FROM `semestre_element_formation` 
                        WHERE `semestre_element_formation`.sem_id IN ( SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` 
                        WHERE `semestre`.id_cursus = `cursus`.cursus_id
                        AND `cursus`.num_etu = `etudiant`.num_etu 
                        AND `cursus`.label_cursus = '".$_SESSION['mon_cursus']."'
                        AND `etudiant`.num_etu = '".$_SESSION['num_etu']."')") or die(print_r($bdd->errorInfo()));

       $req = $bdd->query("DELETE FROM `semestre` 
       	WHERE `semestre`.id_cursus = 
       	(SELECT `cursus`.cursus_id 
       	FROM `cursus`, `etudiant` 
       	WHERE `cursus`.num_etu = `etudiant`.num_etu 
       	AND `cursus`.label_cursus = '".$_SESSION['mon_cursus']."'
       	 AND `etudiant`.num_etu = '".$_SESSION['num_etu']."')") or die(print_r($bdd->errorInfo()));

       $req = $bdd->query("DELETE 
                        FROM `cursus` 
                        WHERE `cursus`.num_etu = 
                        (SELECT `etudiant`.num_etu 
                   		FROM `etudiant`
                        WHERE `etudiant`.num_etu = '".$_SESSION['num_etu']."')") or die(print_r($bdd->errorInfo()));
        
    }

    // Insertion du message à l'aide d'une requête préparée
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page des cursus
header("Location: $_SERVER[HTTP_REFERER]" );
exit;
?>