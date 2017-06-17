<?php
session_start();

$couper = explode(" ", $_POST['cursus_pre_remplies']);
$sigle = $couper[0];
//echo $sigle;

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    $req = $bdd->query('DELETE `semestre_element_formation`.* FROM semestre_element_formation, semestre, cursus, etudiant WHERE `semestre_element_formation`.sigle="' . $sigle . '" 
            AND `semestre_element_formation`.sem_id = `semestre`.sem_id
            AND `semestre`.id_cursus = `cursus`.cursus_id
            AND `cursus`.num_etu = "'.$_SESSION['num_etu'].'" ') 
            or die(print_r($bdd->errorInfo()));
    
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page 
header("Location: $_SERVER[HTTP_REFERER]");
?>