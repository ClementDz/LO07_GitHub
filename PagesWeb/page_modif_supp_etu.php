<?php session_start(); ?>
<!--Page de modification d'un étudiant-->
<!doctype html>
<html>
<head>
    <link href="../CSS/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../CSS/bootstrap/js/bootstrap.js"></script> 
</head>

<body>
    <div class="container">
        <header class="page-header"> <!-- Pour le menu, nous avons utiliser la template de base de Bootstrap -->
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

            <div>
                <p><h1>Etudiant <?php etu_selec(); ?></h1></p>
            </div>
            Voici les informations sur cet étudiant dans notre base de données
            <?php
            if (isset($_POST['mon_etu'])) {
                //Si le formulaire est bien transmis, on récupère les infos
                $nom_et_prenom = $_POST['mon_etu'];
                //On récupère le nom et le prénom
                $couper = explode(" ", $nom_et_prenom);
                $nom = $couper[0];
                $prenom = $couper[1];
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                    $reponse2 = $bdd->query('SELECT num_etu,admi, filiere, email  FROM etudiant WHERE nom="' . $nom . '" AND prenom="' . $prenom . '"');
                    //On récupère les infos pour ce nom et prénom (ne marchera pas pour les homonymes !)
                    $donnees2 = $reponse2->fetch();
                    //var_dump($donnees2);
                    $numeroetudiant = $donnees2[0];
                    $admi = $donnees2[1];
                    $filiere = $donnees2[2];
                    $email = $donnees2[3];
                    $reponse2->closeCursor();
                    ?>
                    <form method='POST' action="../BaseDeDonnees/update_etu.php">
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

                            <p> <input type='submit' value="Valider ces modifications"></p>
                        </fieldset>
                    </form>
                    <form name="supp_etu" action="../BaseDeDonnees/delete_etu.php" method="POST">
                        <!-- Nous ouvre la page permettant d'ajouter un étu à la BDD -->
                        <input type='submit' value='Supprimer cet étudiant'>
                    </form>
                    <a href="page_etudiant.php" class="button">Retour</a>
                    <?php
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
            }
            ?>


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
        </section>
    </body>
    </html>



    <?php

    function etu_selec() {
        if (isset($_POST['mon_etu'])) {
            $etudiant = $_POST['mon_etu'];
            print_r('<i>' . $etudiant . '</i>');
        //Transmettre le nom de l'étu à supprimer dans une variable de session
            $_SESSION['nom_etu_a_supp']=$etudiant;
        }
    }
?>