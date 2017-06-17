<?php
session_start();

//echo $sigle;

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    $req = $bdd->query('DELETE `element_formation`.* 
    	FROM element_formation
    	WHERE `element_formation`.sigle="' . $_POST['mon_UE'] . '" ') 
            or die('<script type="text/javascript">
            	alert("Impossible car ce cours est affecté à au moins un étudiant");
                window.location.href="../PagesWeb/page_UV.php";
            	 </script>');
    
} catch (Exception $e) {

    die('Erreur : Impossible de supprimer car ce cours est affecté à au moins un étudiant');
}

// Redirection du visiteur vers la page 
header("Location: $_SERVER[HTTP_REFERER]");
?>