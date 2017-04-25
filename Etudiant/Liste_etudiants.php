<html>  
    <head>  
        <title>Page accueil</title>
        <link rel="stylesheet" type="text/css" href="../include/CSS/feuille.css" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <a href="../Accueil.php">Accueil</a>
        <a href="../Cursus/Liste_cursus.php">Cursus</a>
        <a href="Liste_etudiants.php">Etudiants</a>
        <a href="Anciens_cours.php">Anciens cours</a>
        <!-- A ne pas montrer dans la version finale -->
        <a href="../Auteurs_contact.php">Auteurs</a>
        <a href="../Sources.php">Sources</a>
        <a href="../Reglement/Les reglements.php">Règlements</a>

        <h1>Etudiants enregistrés</h1>
        <ol>
            <li>Etu_ex_1: BOOOOOB + a suivi MATH01....</li>
            <li>Etu_ex_2: BAAAAAB</li>
            <li></li>
        </ol>

        <form name="nouv_etu" action="Nouvel_etudiant.php" method="POST">
            <p> <input type='submit' value='Ajouter un etudiant'></p>
        </form>

    </body>
</html>

<?php ?>