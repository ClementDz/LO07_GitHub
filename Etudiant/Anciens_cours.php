<?php
// Cette page permet de voir le ou les cursus enregistrés pour un étudiant
// On ouvre les variables de sessions pour permettre d'afficher à l'user quel est l'étu/cours sélectionné
session_start();
?>

<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../CSS/style.css" />
    </head>

    <body>
        <div id="wrapper">
            <div id="header">
                <div id="logo">
                    <h1><a href="#">Testeur de cursus</a></h1>
                </div>
                <div id="slogan">
                    <h2>Mada Mada</h2>
                </div>
            </div>
            <div id="menu">
                <ul>     
                    <!-- Menu -->
                    <li><a href="../Accueil.php">Accueil</a></li>
                    <li><a href="../Cursus/Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="Ajout_etu.php">Etudiants</a></li>
                    <li><a href="Liste_etudiants.php">Associer étu/cursus </a></li>
                    <li><a href="../Cursus/cours_enregistres.php">Cours enregistrés</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <p><h1>Ajout de cours pour l'étudiant <?php etu_selec(); ?></h1></p>
        <p><h2>Ajout par recherche rapide</h2></p>
    <i>Si l'UE souhaitée n'est pas dans la liste, veuillez l'ajouter manuellement</i>
    <p><form method="post" action="Ajout_cours.php" name="UE_ajout_rapide">
        <!-- On récupère tous les cours enregistrés dans la BDD -->
        <select name="ue_pre_remplies" size="10">
            <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            //On récupère tous les cours précédemment rentrés
            $reponse = $bdd->query('SELECT * FROM element_formation');
            while ($donnees = $reponse->fetch()) {
                ?>
                <option> <?php echo $donnees['sigle']; ?></option>
                <?php
            }
            $reponse->closeCursor();
            ?>
        </select>
        <p> <input type='submit' value="Ajouter cette UE à l'étudiant">
            <input type='button' value='Ajouter une UE à la BDD' id="manuel" onclick="manuellement();"></p>
        <!-- Va nous afficher, retirer l'attribut hidden des formulaires  -->
    </form></p>

<h3>UE présentes dans mon cursus</h3>

<?php
//Recupérer le numéro étudiant sélectionné
if (isset($_POST['mon_etu'])) {
    // Via l'ancein formulaire
    $nom_et_prenom = $_POST['mon_etu'];
    $couper = explode(" ", $nom_et_prenom);
    $nom = $couper[0];
    $prenom = $couper[1];
    //var_dump($nom);
    //var_dump($prenom);
//Transmet directement le numéro étudiant de l'etu selec dans la session
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        $reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="' . $nom . '"');
        $donnees2 = $reponse2->fetchColumn();
        $_SESSION['num_etu'] = $donnees2;
        $reponse2->closeCursor();
//La variable de session n'est pas bien définie
        $numero = $_SESSION['num_etu'];
        //var_dump($_SESSION['num_etu']);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
} elseif (isset($_SESSION['num_etu'])) {
    //Ou via les variables de sessions
    $numero = $_SESSION['num_etu'];
}
?>

<form method='post' action="../BDD/add_cours.php" hidden id="ajout_manuel2">
    <!-- Formulaire pour ajouter une UE dans la BDD -->
    <fieldset>
        <legend>Ajout d'une UE</legend>

        <p>
            <label>Sigle de l'UE</label>
            <input type="text" name="sigle" required placeholder='ex : ST09, LO07, BULE'/>
        </p>
        <p>
            <label>Catégorie</label>
            <input type='radio' name="categorie" value="CS" required/>CS
            <input type='radio' name="categorie" value="TM" required/>TM
            <input type='radio' name="categorie" value="EC" required/>EC
            <input type='radio' name="categorie" value="ME" required/>ME
            <input type='radio' name="categorie" value="HT" required/>HT
            <input type='radio' name="categorie" value="NPML" required/>NPML

        </p>

        <p>
            <label>Affectation</label>
            <input type='radio' name="affectation" value="TC" required/>TC
            <input type='radio' name="affectation" value="TCBR" required/>TCBR
            <input type='radio' name="affectation" value="FCBR" required/>FCBR

        </p>

        <p>
            <label>L'UE a t-elle été suivie à l'UTT?</label>
            <input type='radio' name="utt" value="Y" required/>Oui
            <input type='radio' name="utt" value="N" required/>Non
        </p>

        <p>
            <label>L'UE appartient-elle au profil de votre branche/filière?</label>
            <input type='radio' name="profil" value="Y" required/>Oui
            <input type='radio' name="profil" value="N" required/>Non
        </p>

    </fieldset>

    <p> <input type='submit' value='Ajouter cette UE à la BDD' onclick="automatiquement();">
        <!-- Si submit cliqué alors stockage BDD + affichage dans la liste du dessus !!
        on peut en rentrer une autre -->
        <input type='reset' value='Réinitialiser'>
</form>


<p><form method="post" action="###.php" name="UE_ajout_rapide">
    <!-- Cours enregistrés dans la BDD pour un numéro d'étudiant NE MARCHE PAS POUR L'INSTANT -->
    <select name="cursus_pre_remplies" size="6">
        <?php
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

            //On affiche les cursus pour un certain numéro étudiant
            $reponse = $bdd->query('SELECT `semestre_element_formation`.sigle 
FROM `semestre_element_formation` 
WHERE `semestre_element_formation`.`sem_id`IN
( SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant`
WHERE `semestre`.label_cursus = `cursus`.label_cursus AND `cursus`.num_etu = `etudiant`.num_etu AND `etudiant`.num_etu = "'.$numero.'")
');

            while ($donnees = $reponse->fetch()) {
                ?>
                <option> <?php echo($donnees['sigle']); ?></option>
                <?php
            }
            $reponse->closeCursor();
            //$reponse2->closeCursor();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        ?>


    </select>
    <?php recupere_infos_etu(); ?>
    <!-- Ouvrir page pour la modification des cours -->
    <p> <input type='submit' value='Modifier / Supprimer ce cours'></p>
</form></p>

<p><form name="valid_cursus" action="../Cursus/calcul.php" method="post">
    <p><input type='submit' value='Valider mon cursus'></p>
</form></p>

<p><form name="export_cursus" action="../CSV/export.php" method="post">
    <p><input type='submit' value='Exporter le cursus au format csv'></p>
</form></p>





<script type="text/javascript">
    //fonction Js permettant supprimer element hidden du form
    function manuellement() {
        var y = document.getElementById("ajout_manuel2");
        y.style.display = "inline";
    }
    // Cacher l'ajout d'un element manuellement
    function automatiquement() {
        var y = document.getElementById("ajout_manuel2");
        y.style.display = "hidden";
    }
</script> 



</body>  
</html>


<?php

// Afficher les infos sur l'étudiant sélectionné
function etu_selec() {
    if (isset($_POST['mon_etu'])) {
        $etudiant = $_POST['mon_etu'];
        print_r('<i>' . $etudiant . '</i>');
// Lecture session = est elle définie ?
        if (isset($_SESSION)) {
//on récupère son nom dans une var de session
            $_SESSION['nom'] = $etudiant;
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
//on récupère son num_etu dans une var de session
            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
        }
    } elseif (isset($_SESSION['nom'])) {
        print_r('<i>' . $_SESSION['nom'] . '</i>');
    } else {
        echo'Erreur, veuillez resélectionner un étudiant';
    }
}

// Fonction permettant de récupérer les infos sur l'admi + filiere
function recupere_infos_etu() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        if (isset($_SESSION['num_etu'])) {
            $reponse2 = $bdd->query('SELECT admi, filiere FROM etudiant WHERE num_etu="' . $_SESSION['num_etu'] . '"');
            $donnees2 = $reponse2->fetch();
            $_SESSION['admi'] = $donnees2['admi'];
            $_SESSION['filiere'] = $donnees2['filiere'];
            $reponse2->closeCursor();
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>
