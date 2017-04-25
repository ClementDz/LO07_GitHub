<html>
    <head>
        <title>Gestion de cursus</title>
        <link rel="stylesheet" type="text/css" href="../include/CSS/feuille.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <a href="../Accueil.php">Accueil</a>
        <a href="Liste_cursus.php">Cursus</a>
        <a href="../Etudiant/Liste_etudiants.php">Etudiants</a>
        <a href="../Etudiant/Anciens_cours.php">Anciens cours </a>
        <a href="../Auteurs_contact.php">Auteurs </a>
        <a href="../Sources.php">Sources </a>
        <a href="../Reglement/Les reglements.php">Règlements</a>

        <h1> Veuillez rentrer les informations pour de futurs cursus </h1>
        <form method='post' action="####_action.php">
            <!-- Récupérer le nom + prénom + num étu + brance + filiere eventuelle
            l'inscription / connexion -->

            <?php $Total_UE = array(); ?>
            <fieldset>
                <legend>Ajout d'une UE</legend>
                <p>
                    <label>Numéro du semestre <i>(ex: "1" si 1er semestre d'ISI)</i></label>
                    <input type='radio' name="num_seq" value="1" required/>1
                    <input type='radio' name="num_seq" value="2" required/>2
                    <input type='radio' name="num_seq" value="3" required/>3
                    <input type='radio' name="num_seq" value="4" required/>4
                    <input type='radio' name="num_seq" value="5" required/>5
                    <input type='radio' name="num_seq" value="6" required/>6

                </p>
                <p>
                    <label>Label du semestre </label>
                    <input type="text" name="sem_label" required placeholder="ex : TC04, ISI2..."/>
                </p>
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
                    <input type='radio' name="categorie" value="HP" required/>HP
                    <input type='radio' name="categorie" value="NPML" required/>NPML

                </p>

                <p>
                    <label>Affectation</label>
                    <input type='radio' name="affectation" value="TC" required/>TC
                    <input type='radio' name="affectation" value="TCBR" required/>TCBR
                    <input type='radio' name="affectation" value="FCBR" required/>FCBR

                </p>

                <p>
                    <label>L'UE sera-t-elle été suivie à l'UTT?</label>
                    <input type='radio' name="utt" value="Y" required/>Oui
                    <input type='radio' name="utt" value="N" required/>Non
                </p>

                <p>
                    <label>L'UE appartient-elle au profil de votre branche/filière?</label>
                    <input type='radio' name="profil" value="Y" required/>Oui
                    <input type='radio' name="profil" value="N" required/>Non
                </p>

            </fieldset>
            <!-- Trouver fonction qui associe la categorie au nb de credit (CS = 6) -->

            <p> <input type='submit' value='Valider'></p>
        </form>

        <?php affichage(); ?>
    </body>
</html>

<?php

function affichage() {
    foreach ($_POST as $key => $value) {
        if (is_array($value))
            printf("<li><b>%s</b> = %s</li>", $key, implode(" : ", $value));
        else
            printf("<li><b>%s</b> = %s</li>", $key, $value);
    }
    echo(" </ul>\n");
    echo("<p/>\n");
}
?>
<!-- <script type="text/javascript">
    function affiche() {
    document.getElementById("ad").innerHTML = "<fieldset>";
    document.getElementById("ad1").innerHTML = "<legend>Ajout d'une UE</legend>";
    document.getElementById("ad2").innerHTML = "<p>""
            document.getElementById("ad3").innerHTML = "<label>Numéro du semestre <i>(ex: "1" si 1er semestre d'ISI)</i></label>";
    document.getElementById("ad4").innerHTML = "<input type='radio' name="num_seq" value="1" required/>1";
    document.getElementById("ad5").innerHTML = "<input type='radio' name="num_seq" value="2" required/>2";
    document.getElementById("ad6").innerHTML = "</p>";
    }
</script>  
-->


