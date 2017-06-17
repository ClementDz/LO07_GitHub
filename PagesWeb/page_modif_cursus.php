 <?php
session_start(); // On démarre la session AVANT toute chose
?>
<!--Page de test des cursus-->
<html>
<head>
  <link href="../CSS/bootstrap/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../CSS/bootstrap/js/bootstrap.js"></script> 
</head>

<body>
  <div class="container">
     <header class="page-header">
        <div class="col-sm-12">
           <nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="navbar-header">
                 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="accueil.php">Testeur de Cursus</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
             <ul class="nav navbar-nav">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="page_etudiant.php">Etudiants</a></li>
                <li><a href="page_UV.php">UEs</a></li>
                <li><a href="reglements.php">Reglements</a></li>
                <li><a href="a_propos">A propos de nous</a></li>
            </ul>
        </div>
    </nav>
</div>
</header>
<section class="row">
    <article class="col-lg-6">
    <p><h1>Bonjour, <?php etu_selec(); ?></h1></p>
    <h3>Modification du cursus : <?php cursus_selec(); ?></h3>

    <p><a href="../PagesWeb/page_cursus.php" class="button">Retour à la liste des cursus</a></p>

        <form method="post" action="../BaseDeDonnees/add_uv_dans_cursus.php">
           <p> Sélectionner une UE: </p>
            <label>Voici la liste des UEs deja enregistrées</label><br/>
            <select size="10" name="mon_UE">
                <?php
                        //Affiche toutes les UEs de la base par ordre alphabétique
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                    $reponse = $bdd->query('SELECT sigle FROM element_formation ORDER BY sigle');
                    while ($donnees = $reponse->fetch()) {
                        ?>
                        <option> <?php echo $donnees['sigle']; ?></option>
                        <?php
                    }
                    $reponse->closeCursor();
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                ?>
            </select>

            <p> Si l'UV ne figure pas dans le catalogue, cliquez ici : </p>
            <a href="page_UV.php" class="button">Ajouter une UE</a><br/>

            <fieldset>
                <legend>Semestre</legend>
                <p>
                    <label>Label du semestre </label>
                    <input type="text" name="sem_label" required placeholder="ex : TC04, ISI2..."/>
                </p>
            </fieldset>
            <fieldset>
                <legend>Numéro du semestre</legend>
                <p>
                    <label>En quel semestre avez-vous effectué l'UE <i>(Nombre de semestres passés à l'utt)</i></label>
                    <p>
                        <input type='radio' name="sem_seq" value="1" required/>1
                        <input type='radio' name="sem_seq" value="2" required/>2
                        <input type='radio' name="sem_seq" value="3" required/>3
                        <input type='radio' name="sem_seq" value="4" required/>4
                        <input type='radio' name="sem_seq" value="5" required/>5
                        <input type='radio' name="sem_seq" value="6" required/>6
                        <input type='radio' name="sem_seq" value="7" required/>7
                        <input type='radio' name="sem_seq" value="8" required/>8
                        <input type='radio' name="sem_seq" value="9" required/>9
                        <input type='radio' name="sem_seq" value="10" required/>10
                    </p>
                </p>
            </fieldset>
            <fieldset>
                <legend>Résultat à l'UE</legend>
                <p>
                    <label>Résultat</label>
                    <input type='radio' name="resultat" value="A" required/>A
                    <input type='radio' name="resultat" value="B" required/>B
                    <input type='radio' name="resultat" value="C" required/>C
                    <input type='radio' name="resultat" value="D" required/>D
                    <input type='radio' name="resultat" value="E" required/>E
                    <input type='radio' name="resultat" value="F" required/>F
                    <input type='radio' name="resultat" value="Fx" required/>Fx
                    <input type='radio' name="resultat" value="ABS" required/>ABS
                    <input type='radio' name="resultat" value="EQU" required/>EQU
                    <input type='radio' name="resultat" value="RES" required/>RES
                    <input type='radio' name="resultat" value="ADM" required/>ADM
                </p>

                <p>
                    <label>Crédits obtenus</label>
                    <input type='radio' name="credit" value="0" required/>0
                    <input type='radio' name="credit" value="4" required/>4
                    <input type='radio' name="credit" value="6" required/>6
                    <input type='radio' name="credit" value="30" required/>30
                </p>

                <p>
                    <label>L'UE appartient-elle au profil de votre branche/filière?</label>
                    <input type='radio' name="profil" value="Y" required/>Oui
                    <input type='radio' name="profil" value="N" required/>Non
                </p>
            </fieldset>
            <input type='submit' value="Ajouter cette UE à votre cursus">
            <!--<input type='submit' value="Terminer le cursus">-->
            <input type='reset' value='Annuler'>
        </form>
    </article>
    <article class="col-lg-6">
    <p><h3>Liste des UEs présentes dans ce cursus</h3></p>
        <p><form method="post" action="../PagesWeb/page_calcul.php" name="UE_cursus">
            <!-- Cours enregistrés dans la BDD pour un numéro d'étudiant NE MARCHE PAS POUR L'INSTANT -->
            <select name="cursus_pre_remplies" size="6">
                <?php
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

            //On affiche les cursus pour un certain numéro étudiant
                    $reponse = $bdd->query('SELECT * 
                        FROM `semestre_element_formation` 
                        WHERE `semestre_element_formation`.sem_id IN ( SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` 
                        WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu AND `etudiant`.num_etu = "'. $_SESSION['num_etu'] .'" )');

                    while ($donnees = $reponse->fetch()) {
                        ?>
                        <option> <?php echo($donnees['sigle'] ."     Résultat : ". $donnees['resultat']); ?></option>
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
            <p> <input type='submit' value='Valider mon cursus'></p>
            
            <p> <input type='submit' value='Supprimer ce cours' formaction="../BaseDeDonnees/delete_cours_from_cursus.php"></p>
        </form>
        
        <form method="post" action="../CSV/export.php" name="export">
            <p><input type='submit' value='Exporter ce cursus'></p>
        </form>

    </article>
</section>
</div>
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

            $couper = explode(" ", $etudiant);
            $nom = $couper[0];
            $prenom = $couper[1];

            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="'.$nom.'" AND prenom="'.$prenom.'"');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
            echo $_SESSION['num_etu'];
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

function cursus_selec() {
    if (isset($_POST['mon_cursus'])) {
        $cursus = $_POST['mon_cursus'];
        print_r('<i>' . $cursus . '</i>');
// Lecture session = est elle définie ?
        if (isset($_SESSION)) {
//on récupère son nom dans une var de session
            $_SESSION['mon_cursus'] = $cursus;
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
//on récupère son num_etu dans une var de session

            /*$couper = explode(" ", $etudiant);
            $nom = $couper[0];
            $prenom = $couper[1];

            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="'.$nom.'" AND prenom="'.$prenom.'"');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
            echo $_SESSION['num_etu'];*/
        }
    } elseif (isset($_SESSION['mon_cursus'])) {
        print_r('<i>' . $_SESSION['mon_cursus'] . '</i>');
    } else {
        echo'Erreur, veuillez resélectionner un cursus';
    }
}?>