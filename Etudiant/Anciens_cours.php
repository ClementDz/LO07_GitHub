<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <p>
            <a href="../Cursus/Nouveau_cursus.php">Nouveau cursus</a>
            <a href="Page_etudiant.php">Les étudiants</a>
            <a href="Anciens_cours.php"> Anciens cours </a>
            <a href="../Auteurs_contact.php">Auteurs</a>
            <a href="../Sources.php">Sources</a>
            <a href="../Reglement/Les reglements.php">Règlements</a>

        </p>
        <h1>Liste de vos cours enregistrés</h1>
        <!-- Voir lors cours BDD -->

        <h1>Liste de vos cours passés</h1>
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
            <!-- Trouver fonction qui associe la categorie au nb de credit (CS = 6) -->
            
            <!-- On ne peut pas utiliser une fonction PHP dans l'event Onclik (ou faut passer par ajax)
            On va donc passer par du Js-->

            <p> <input type='submit' value='Valider'></p>
            <!-- Si submit cliqué alors stockage BDD + affichage dans la liste du dessus !!
            on peut en rentrer une autre -->
        </form>

    </body>  
</html>

<?php
?>
