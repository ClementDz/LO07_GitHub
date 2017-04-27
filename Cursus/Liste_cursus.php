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
                    <li><a href="Liste_cursus.php">Cursus</a></li>
                    <li><a href="../Etudiant/Liste_etudiants.php">Etudiants</a></li>
                    <li><a href="../Etudiant/Anciens_cours.php"> Anciens cours </a></li>
                    <li><a href="../Auteurs_contact.php">Auteurs </a></li>
                    <li><a href="../Sources.php">Sources </a></li>
                    <li><a href="Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <p><h1>Cursus enregistrés</h1></p>
            Modifier / effacer / dupliquer + exporter importer CSV
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

<?php ?> 