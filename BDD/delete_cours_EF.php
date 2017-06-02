<?php
// On supprime le cours uniquement de la table ELEMENT FORMATION avec confirmation JS
//La confirmation Js et le header bugent, correction plus tard si temps

/*try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    ?>
    <script>

        //var txt;
        var ueselec = '<?php echo $_POST['ue_pre_remplies'] ?>';
        var r = confirm("Voulez-vous supprimer " + ueselec + "?\n\Attention cela supprimera le cours de la base générale mais pas de vos cursus");
        if (r == true) {
            //txt = "You pressed OK!";
    <?php
//header('Location: ../Cursus/cours_enregistres.php');
    $req = $bdd->query('DELETE from element_formation WHERE sigle="' . $_POST['ue_pre_remplies'] . '" ') or die(print_r($bdd->errorInfo()));
//header('Location: ../Cursus/cours_enregistres.php');
    ?>
        } else {
            //txt = "You pressed Cancel!";
        }
        //document.getElementById("demo").innerHTML = txt;

    </script>
    <?php
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}*/

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    $req = $bdd->query('DELETE from element_formation WHERE sigle="' . $_POST['ue_pre_remplies'] . '" ') or die(print_r("Vous ne pouvez pas supprimer ce cours de la BDD général car ce cours est déjà associé à un ou plusieurs cursus"));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Redirection du visiteur vers la page 
header("Location: $_SERVER[HTTP_REFERER]");
?>

