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
                    <h2>I need healing</h2>
                </div>
            </div>
            <div id="menu">
                <ul>
                    <li><a href="../Accueil.php">Accueil</a></li>
                    <li><a href="../Cursus/Liste_cursus.php">Cursus</a></li>
                    <li><a href="Liste_etudiants.php">Etudiants</a></li>
                    <li><a href="Anciens_cours.php">Anciens cours</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>


            <p><h1>Ajout d'un étudiant</h1></p>
        <form method='POST' action="../BDD/add_etu.php">
            <fieldset>
                <legend>Données étudiantes</legend>
                <i>Veuillez rentrer toutes les informations suivantes</i>
                <p> <label>Nom</label>
                    <input type="text" name="nom" id="nom"required/>            
                </p>

                <p>
                    <label>Prénom</label>
                    <input type="text" name="prenom" id="prenom" required/>
                </p>
                <p>
                    <label>Numéro étudiant</label>
                    <input type="text" name="num_etu" id="num_etu "placeholder="ex : 38288"required/>
                </p>
                <p>
                    <label>Admission</label>
                    <input type="radio" name="admi" value="TC" id="admi"required/>TC
                    <input type="radio" name="admi" value="Branche" id="admi" required>Branche

                </p>
                <p>
                    <label>Votre filière actuelle</label>
                    <input type="radio" name="filiere" id="filiere" value="TC" required onclick="affichepas()"/>TC
                    <input type="radio" name="filiere" id="filiere" value="TCBR" required onclick="affichepas()"/>TCBR
                    <input type="radio" name="filiere" id="filiere" value="FI" required onclick="affiche();"/>Filière

                <div id="ad"> </div>
                <div id="ad1"> </div>
                <div id="ad2"> </div>
                <div id="ad3"> </div>
                <div id="ad4"> </div>
                <div id="ad5"> </div>


                <script type="text/javascript">
                    function affiche() {
                        document.getElementById("ad").innerHTML = "<p>";
                        document.getElementById("ad1").innerHTML = "<input type='radio' name='filiere' value='MSI'/>MSI";
                        document.getElementById("ad2").innerHTML = "<input type='radio' name='filiere' value='MPL'/>MPL";
                        document.getElementById("ad3").innerHTML = "<input type='radio' name='filiere' value='MRI'/>MRI";
                        document.getElementById("ad4").innerHTML = "<input type='radio' name='filiere' value='MRI'/>Libre";
                        document.getElementById("ad5").innerHTML = "</p>";
                    }

                </script>  
                <script type="text/javascript">
                    function affichepas() {
                        document.getElementById("ad").innerHTML = "";
                        document.getElementById("ad1").innerHTML = "";
                        document.getElementById("ad2").innerHTML = "";
                        document.getElementById("ad3").innerHTML = "";
                        document.getElementById("ad4").innerHTML = "";
                        document.getElementById("ad5").innerHTML = "";
                    }
                </script>
                </p>

                <?php
                ?>

                <p>
                    <label>Email</label>
                    <input type="email" name="email" id="email" placeholder="prenom.nom@utt.fr"required/>
                    <!-- Ajouter validation mail -->
                </p>
            </fieldset>

            <fieldset>
                <legend>Confirmation</legend>
                <p> <input type='submit' value='Valider'>
                    <input type='reset' value='Réinitialiser'></p>
            </fieldset>
        </form>
        <?php
        validmail();
        affiche_form();

        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        } catch (Exception $e) {
            
            echo('Ne se connecte pas');
            die('Erreur : ' . $e->getMessage());
            
        }

        // Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT nom, prenom, num_etu, admi, filiere, email FROM etudiant');
        $reponse->closeCursor();
        
        ?>
</body>
</html>


<?php

function validmail() {
    if (isset($_POST["email"])) {
        $email_valide = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if ($email_valide === FALSE) {
            echo("$_POST[email] n'est pas valide \n");
        } else {
            echo("$_POST[email] est valide \n");
        }
    }
}

function affiche_form() {
    foreach ($_POST as $name => $value) {
        if (is_array($value)) {
            echo("<li>" . $name . "=" . implode(',', $value) . "</li>");
        } else {
            echo("<li>" . $name . "=" . $value . "</li>");
        }
    }
}
?>