<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <p>
            <a href="../Accueil.php">Accueil</a>
            <a href="../Cursus/Liste_cursus.php">Cursus</a>
            <a href="Liste_etudiants.php">Etudiants</a>
            <a href="Anciens_cours.php">Anciens cours</a>
            <a href="../Auteurs_contact.php">Auteurs</a>
            <a href="../Sources.php">Sources</a>
            <a href="../Reglement/Les reglements.php">Règlements</a>
        </p>

        <h1>Ajout d'un étudiant</h1>
        <form method='POST' action="Nouvel_etudiant.php">
            <fieldset>
                <legend>Vos données étudiantes</legend>
                <p> <label>Nom</label>
                    <input type="text" name="Nom" required/>            
                </p>
                <p>
                    <label>Prénom</label>
                    <input type="text" name="Prenom" required/>
                </p>
                <p>
                    <label>Numéro étudiant</label>
                    <input type="text" name="num_etu" placeholder="ex : 38288"required/>
                </p>
                <p>
                    <label>Admission</label>
                    <input type="radio" name="admi" value="TC"/>TC
                    <input type="radio" name="admi" value="Branche">Branche

                </p>
                <p>
                    <label>Votre filière actuelle</label>
                    <input type="radio" name="filiere" value="TC" onclick="affichepas()"/>TC
                    <input type="radio" name="filiere" value="TCBR" onclick="affichepas()"/>TCBR
                    <input type="radio" name="filiere" value="FI"onclick="affiche();"/>Filière

                <div id="ad"> </div>
                <div id="ad1"> </div>
                <div id="ad2"> </div>
                <div id="ad5"> </div>
                <div id="ad6"> </div>
                <div id="ad7"> </div>


                <script type="text/javascript">
                    function affiche() {
                        document.getElementById("ad").innerHTML = "<p>";
                        document.getElementById("ad1").innerHTML = "<input type='radio' name='filiere' value='MSI'/>MSI";
                        document.getElementById("ad2").innerHTML = "<input type='radio' name='filiere' value='MPL'/>MPL";
                        document.getElementById("ad5").innerHTML = "<input type='radio' name='filiere' value='MRI'/>MRI";
                        document.getElementById("ad6").innerHTML = "<input type='radio' name='filiere' value='MRI'/>Libre";
                        document.getElementById("ad7").innerHTML = "</p>";
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
                    <input type="email" name="email" placeholder="prenom.nom@utt.fr"required/>
                    <!-- Ajouter validation mail -->
                </p>
            </fieldset>

            <fieldset>
                <legend>Confirmation</legend>
                <p> <input type='submit' value='Valider'>
                    <input type='reset' value='Réinitialiser'></p>
            </fieldset>
        </form>
        <?php validmail(); ?>
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

$nom = filter_input(INPUT_POST, "nom");
$prenom = filter_input(INPUT_POST, "prenom");
$num_etu = filter_input(INPUT_POST, "num_etu");
//session_start();
$donnees = array($nom, $prenom, $num_etu);

foreach ($donnees as $name => $value) {
    if (is_array($value)) {
        echo("<li>" . $name . "=" . implode(',', $value) . "</li>");
    } else {
        echo("<li>" . $name . "=" . $value . "</li>");
    }
}
?>