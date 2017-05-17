<?php session_start(); ?>
<html>  
    <head>  
        <title>Liste étudiants</title>
        <link rel="stylesheet" type="text/css" href="../include/CSS/feuille.css" />
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
                    <h2>Design by TEMPLATED</h2>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="../Accueil.php">Accueil</a></li>
                    <li><a href="../Cursus/Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="Ajout_etu.php">Etudiants</a></li>
                    <li><a href="Liste_etudiants.php">Associer étu/cursus </a></li>
                    <li><a href="Anciens_cours.php">Mes cursus</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
            </div>

            <div>
                <p><h1>Etudiant <?php etu_selec(); ?></h1></p>
            </div>
            Voici les informations sur cet étudiant dans notre base de donnée
            <?php
            if (isset($_POST['mon_etu'])) {
                //Si le formulaire est bien transmi, on récupère les infos
                $nom_et_prenom = $_POST['mon_etu'];
                //On récupère le nom et le prénom
                $couper = explode(" ", $nom_et_prenom);
                $nom = $couper[0];
                $prenom = $couper[1];
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                    $reponse2 = $bdd->query('SELECT num_etu,admi, filiere, email  FROM etudiant WHERE nom="' . $nom . '" AND prenom="' . $prenom . '"');
                    $donnees2 = $reponse2->fetch();
                    //var_dump($donnees2);
                    $numeroetudiant = $donnees2[0];
                    $admi = $donnees2[1];
                    $filiere = $donnees2[2];
                    $email = $donnees2[3];
                    $reponse2->closeCursor();
                    //La variable de session n'est pas bien définie
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
            ?>
            <form method='POST' action="../BDD/update_etu.php">
                <fieldset>
                    <legend>Données étudiantes</legend>
                    <i>Veuillez modifier les informations suivantes</i>
                    <p> <label>Nom</label>
                        <input type="text" name="nom" id="nom" required value=<?php echo($nom) ?> />            
                    </p>

                    <p>
                        <label>Prénom</label>
                        <input type="text" name="prenom" id="prenom" required value=<?php echo($prenom) ?> />
                    </p>
                    <p>
                        <label>Numéro étudiant</label>
                        <input type="text" name="num_etu" id="num_etu" required value=<?php echo($numeroetudiant) ?> />
                    </p>
                    <p>
                        <label>Admission</label>
                        <!-- Faire un if checked,  -->
                        <input type="radio" name="admi" value="TC" id="admi"required/>TC
                        <input type="radio" name="admi" value="Branche" id="admi" required>Branche

                    </p>
                    <p>
                        <label>Votre filière actuelle</label>
                        <input type="radio" name="filiere" id="filiere" value="TC" required onclick="affichepas()"/>TC
                        <input type="radio" name="filiere" id="filiere" value="TCBR" required onclick="affichepas()"/>TCBR
                        <input type="radio" name="filiere" id="filiere" value="FI" required onclick="affiche();"/>Filière
                    </p>

                    <div id="ad"> </div>
                    <div id="ad1"> </div>
                    <div id="ad2"> </div>
                    <div id="ad9"> </div>
                    <div id="ad10"> </div>
                    <div id="ad5"> </div>

                    <p>
                        <label>Email</label>
                        <input type="email" name="email" id="email" required value="<?php echo($email) ?>"/>
                        <!-- Ajouter validation mail -->
                    </p>
                    
                    <p> <input type='submit' value="Valider ces modifications">
                        <input type='button' value='Supprimer cet étudiant'></p>
                </fieldset>
            </form>

            <script type="text/javascript">
                function affiche() {
                    document.getElementById("ad").innerHTML = "<p>";
                    document.getElementById("ad1").innerHTML = "<input type='radio' name='filiere' value='MSI'/>MSI";
                    document.getElementById("ad2").innerHTML = "<input type='radio' name='filiere' value='MPL'/>MPL";
                    document.getElementById("ad9").innerHTML = "<input type='radio' name='filiere' value='MRI'/>MRI";
                    document.getElementById("ad10").innerHTML = "<input type='radio' name='filiere' value='Libre'/>Libre";
                    document.getElementById("ad5").innerHTML = "</p>";
                }

            </script>  
            <script type="text/javascript">
                function affichepas() {
                    document.getElementById("ad").innerHTML = "";
                    document.getElementById("ad1").innerHTML = "";
                    document.getElementById("ad2").innerHTML = "";
                    document.getElementById("ad9").innerHTML = "";
                    document.getElementById("ad10").innerHTML = "";
                    document.getElementById("ad5").innerHTML = "";
                }
            </script>
        </div>
    </body>
</html>



<?php

function etu_selec() {
    if (isset($_POST['mon_etu'])) {
        $etudiant = $_POST['mon_etu'];
        print_r('<i>' . $etudiant . '</i>');
        // Lecture session = est elle définie ?
        if (isset($_SESSION)) {
            //ajout d'une var de session
            $_SESSION['nom'] = $etudiant;
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
            //$_SESSION['label_cursus'] = 'label_$donnees';
        }
    }
}
?>