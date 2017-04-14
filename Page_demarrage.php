<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <p>
            <a href="Nouveau_cursus.php"> Nouveau cursus </a>
            <a href=""> Mes anciens cursus </a>
            <a href="Auteurs_contact.php"> Les auteurs </a>
            <a href="Sources.php"> Les sources </a>
        </p>

        <h1>Connexion</h1>

        <!-- Faire un se connecter / créer un compte ==> BASE DE DONNEE ?
        ou session ?-->

        <form method='POST' action="Page_demarrage.php">
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
                    <input type="radio" name="admi" value="TC" onclick="affichepas()"/>TC
                    <input type="radio" name="admi" value="Branche"
                           onclick="affiche()";>Branche

                <div id="ad"> </div>
                <div id="ad1"> </div>
                <div id="ad2"> </div>

                <script type="text/javascript">
                    function affiche() {
                        document.getElementById("ad").innerHTML = "<p>";
                        document.getElementById("ad1").innerHTML = "Filière";
                        document.getElementById("ad2").innerHTML = "<input placeholder='MSI,MPL...? si en TCBR' type = 'text' name = 'filiere' required/>";
                        document.getElementById("ad3").innerHTML = "</p>";
                    }
                </script>  
                <script type="text/javascript">
                    function affichepas() {
                        document.getElementById("ad").innerHTML = "";
                        document.getElementById("ad1").innerHTML = "";
                        document.getElementById("ad2").innerHTML = "";
                        document.getElementById("ad3").innerHTML = "";
                    }
                </script>


                </p>
                <?php
                // COMMENT RECUPERER $post[admi] DES LE CLIC ?
                //var_dump($_POST["admi"]);
                /* if ($_POST["admi"] == "Branche"){
                  echo("<p>");
                  echo("<label>Filière</label>");
                  echo("<i>Rentrer ? si vous êtes en TCBR</i>");
                  echo("<input type = 'text' name = 'filiere' required/>");
                  echo("</p>");
                  }; */
                ?>

                <p>
                    <label>Email</label>
                    <input type="email" name="email" required/>
                    <!-- Ajouter validation mail -->
                </p>
                <p>
                    <label>Mot de passe</label>
                    <input type="password" name="mdp" required/>
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

$nom = filter_input(INPUT_POST,"nom");
$prenom = filter_input(INPUT_POST,"prenom");
$num_etu = filter_input(INPUT_POST,"num_etu");
session_start();
$donnees=array($nom,$prenom,$num_etu);

foreach($donnees as $name => $value){
    if (is_array($value)){
        echo("<li>".$name. "=".implode(',',$value)."</li>");
    }
    else {
        echo("<li>".$name. "=". $value."</li>");
    }
}
//session_start();

?>