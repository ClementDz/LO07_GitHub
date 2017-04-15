<html>
    <head>
        <title>Gestion de cursus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <a href="page_demarrage.php"> Page démarrage</a>
        <a href="Ancien_cursus.php"> Mes anciens cursus </a>
        <a href="Auteurs_contact.php"> Les auteurs </a>
        <a href="Sources.php"> Les sources </a>


        <form method='post' action="####_action.php">
            <!-- On doit ajouter les infos passées + futures ??? -->
            <h1> Veuillez rentrer les informations sur vos UE passées </h1>    
            <!-- Récupérer le nom + prénom + num étu + brance + filiere eventuelle
            l'inscription / connexion -->

            <?php $Total_UE = array(); ?>
            <p>
                <label>Numéro du semestre <i>ex: "1" si 1er semestre en TC</i></label>
                <input type='radio' name="num_seq" value="1" required/>1
                <input type='radio' name="num_seq" value="2" required/>2
                <input type='radio' name="num_seq" value="3" required/>3
                <input type='radio' name="num_seq" value="4" required/>4
                <input type='radio' name="num_seq" value="5" required/>5
                <input type='radio' name="num_seq" value="6" required/>6

            </p>
            <p>
                <label>Label du semestre </label>
                <input type="text" name="sem_label" required placeholder="ex : TC1, ISI4..."/>
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
                <input type='radio' name="categorie" value="TC" required/>TC
                <input type='radio' name="categorie" value="TCBR" required/>TCBR
                <input type='radio' name="categorie" value="FCBR" required/>FCBR

            </p>
            
            <input type='button' value ="ajouter une UE" onclick="affiche();"/>
            <!-- Faire des héritages avec la fonction affiche() de l'autre page -->

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

