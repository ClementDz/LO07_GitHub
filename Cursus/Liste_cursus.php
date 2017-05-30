<html>  
    <head>  
        <title>Liste des cursus</title>
        <link rel="stylesheet" type="text/css" href="../include/CSS/style.css" />
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
                    <li><a href="Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="../Etudiant/Ajout_etu.php">Etudiants</a></li>
                    <li><a href="../Etudiant/Liste_etudiants.php">Associer étu/cursus</</a></li>
                    <li><a href="cours_enregistres.php">Cours enregistres</a></li>
                    <li><a href="../Auteurs_contact.php">Auteurs </a></li>
                    <li><a href="../Sources.php">Sources </a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <p><h1>Futurs cours</h1></p>
            Modifier / effacer / dupliquer / tester avec ce cursus
            <ol>
                <li>Cursus_ex_1: IF02, GL98</li>
                <li>Cursus_ex_1: IF03, GL99</li>
                <li></li>
            </ol>

            <form name="nouv_curs" action="Nouveau_cursus.php" method="POST">
                <p> <input type='submit' value='Ajouter un cursus'></p>
            </form>

    </body>
</html>

<?php

//Enregistrer dans un fichier csv
function persistance() {
    $filename = "mes_cursus.csv";
    var_dump(file_exists($filename));
    if (!file_exists($filename)) {
        $titre = array("jour", "mois", "salle");
        $ligne = implode(";", $titre);
        touch($filename); //Modifie la date de modification
        file_put_contents($filename, $ligne, FILE_APPEND); //écrit une ligne
        // FILE_APPEND permet d'ajouter les data a la fin si on a deja un meme filename
    } else {
        $ligne = filter_input(INPUT_POST, "jour");
        $ligne = filter_input(INPUT_POST, "mois");
        $ligne = filter_input(INPUT_POST, "salle");

        file_put_contents($filename, $ligne, FILE_APPEND);
    }
}?> 