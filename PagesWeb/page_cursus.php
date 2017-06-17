s<?php
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
                    <h1>Cursus</h1>
                    <p>Voici l'outil de création de cursus.<br> Vous pouvez dès à présent sélectionner les cours que vous souhaitez affecter à l'étudiant. Assurez-vous d'avoir sélectionné un étudiant au préalable.</p><br/>
                    <form method="post" action="../BaseDeDonnees/add_cursus.php">
                        <fieldset>
                            <legend>Ajouter un nouveau Cursus</legend>
                            <p>
                                <label>Insérer un nom de cursus</label>
                                <input type="text" name="label_cursus" required placeholder="ex : cursus_Dubois"/>
                            </p>
                        </fieldset>
                        <input type='submit' name="creer_cursus" value="Créer ce cursus"/>
                    </form>


                </article>
                <article class="col-lg-6">

                    <label>Voici la liste des cursus deja enregistrés pour cet étudiant :</label><br/>
                    <p>
                    <form method="post" action="../PagesWeb/page_modif_cursus.php" name="choix_cursus">
                        <select size="10" name="mon_cursus">
                            <?php
                            //Affiche toutes les UEs de la base par ordre alphabétique
                            try {
                                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                                $reponse = $bdd->query('SELECT label_cursus FROM cursus WHERE num_etu = "' . $_SESSION['num_etu'] . '" ORDER BY label_cursus');
                                while ($donnees = $reponse->fetch()) {
                                    ?>
                                    <option> <?php echo $donnees['label_cursus']; ?></option>
                                    <?php
                                }
                                $reponse->closeCursor();
                            } catch (Exception $e) {
                                die('Erreur : ' . $e->getMessage());
                            }
                            ?>
                        </select>
                        <p> <input type='submit' value='Editer le cursus'></p>
                        <p> <input type='submit' value='Supprimer le cursus' formaction="../BaseDeDonnees/delete_cursus.php"></p>
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

            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="' . $nom . '" AND prenom="' . $prenom . '"');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
            //echo $_SESSION['num_etu'];
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