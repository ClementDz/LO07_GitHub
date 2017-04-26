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

            <p><h1>Ajout de cours pour l'étudiant _____</h1></p>

        <p><h1>Ajout par recherche rapide</h1></p>
    <!-- Voir lors cours BDD -->
    <p><form method="post" action="Anciens_cours.php" name="UE_ajout_rapide">
        <select name="ue_pre_remplies" size="5">
            <OPTION>IF99</option>
            <OPTION>IF77</option>
            <OPTION >IFEE</option>
        </select>
        <p> <input type='submit' value='Ajouter cette UE'>
            <input type='button' value='Ajouter une UE manuellement'
                   name="manuel" id="manuel" onclick="manuellement();"></p>
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
    </fieldset>

    <p> <input type='submit' value='Ajouter cette UE' onclick="automatiquement();">
        <!-- Si submit cliqué alors stockage BDD + affichage dans la liste du dessus !!
        on peut en rentrer une autre -->
</form>


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
</script> 

</body>  
</html>

<?php
?>
