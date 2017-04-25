<html>  
    <head>  
        <title>Page accueil</title>
        <link rel="stylesheet" type="text/css" href="../include/CSS/feuille.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="../Accueil.php">Accueil</a>
        <a href="Liste_cursus.php">Cursus</a>
        <a href="../Etudiant/Liste_etudiants.php">Etudiants</a>
        <a href="../Etudiant/Anciens_cours.php"> Anciens cours </a>
        <!-- A ne pas montrer dans la version finale -->
        <a href="../Auteurs_contact.php">Auteurs </a>
        <a href="../Sources.php">Sources </a>
        <a href="../Reglement/Les reglements.php">Règlements</a>

        <h1>Cursus enregistrés</h1>
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