<html>
    <head>
        <title>Gestion de cursus</title>
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
                    <li><a href="Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="../Etudiant/Ajout_etu.php">Etudiants</a></li>
                    <li><a href="../Etudiant/Liste_etudiants.php">Associer étu/cursus</</a></li>
                    <li><a href="../Etudiant/Anciens_cours.php">Mes cursus</a></li>
                    <li><a href="../Auteurs_contact.php">Auteurs </a></li>
                    <li><a href="../Sources.php">Sources </a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <!-- PAS BESOIN DE DEMANDER LE NOMBRE DE COURS DU CURSUS>-->

            <p><h1>Ajout par recherche rapide</h1></p>
        <i>Si l'UE souhaitée n'est pas dans la liste, veuillez l'ajouter manuellement</i>
        <!-- Voir lors cours BDD -->
        <p><form method="post" action="Nouveau_cursus.php">
            <select name="ue_pre_remplies" size="5">
                <OPTION>IF99</option>
                <OPTION>IF77</option>
                <OPTION>IFEE</option>
            </select>
            <p> <input type='button' value='Ajouter cette UE' onclick="ajout()">
            <!-- ATTENTION, ajout() ne reste affiché que si on a un type button -->
                <input type='button' value='Ajouter une UE manuellement'
                       id="manuel" onclick="manuellement();"></p>
        </form></p>

    <div id="ad"> </div>

    <form method='post' action="####_action.php" hidden id="ajout_manuel">
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

        <p> <input type='submit' value='Ajouter cette UE' onclick="automatiquement();">
            <!-- Si submit cliqué alors stockage BDD + affichage dans la liste du dessus !!
            on peut en rentrer une autre -->
            <input type='reset' value='Réinitialiser'>
    </form>

    <div id="ajout"> </div>

    <script type="text/javascript">
        //fonction Js permettant supprimer element hidden du form
        function manuellement() {
            document.getElementById("ad").innerHTML = "<p><h1>Ajout manuel</h1></p>";
            var y = document.getElementById("ajout_manuel");
            y.style.display = "inline";
        }
        // Cacher l'ajout d'un element manuellement
        function automatiquement() {
            var y = document.getElementById("ajout_manuel");
            y.style.display = "hidden";
        }

        function ajout() {
            // Fonction affichant les choix de l'utilisateur (
            document.getElementById("ajout").innerHTML = "<p>test</p>";
        }
    </script> 
</body>
</html>





<?php
affichage();

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

