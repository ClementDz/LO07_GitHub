<?php
// On supprime le cours uniquement de la table ELEMENT FORMATION
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    ?>
    <script>
        var txt;
        var ueselec = '<?php echo $_POST['ue_pre_remplies'] ?>';
        var r = confirm("Voulez-vous supprimer " + ueselec +"?\n\Attention cela supprimera le cours de la base générale mais pas de vos cursus");
        if (r == true) {
            txt = "You pressed OK!";
            <?php
            $req = $bdd->query('DELETE from element_formation WHERE sigle="' . $_POST['ue_pre_remplies'] . '" ') or die(print_r($bdd->errorInfo()));
            ?>
        } else {
            <?php echo 'test2';?>
            txt = "You pressed Cancel!";
            header('Location: ../Cursus/cours_enregistres.php');
        }
        document.getElementById("demo").innerHTML = txt;
    </script>
    <?php    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page 
header('Location: ../Cursus/cours_enregistres.php');
?>

