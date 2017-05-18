<?php session_start(); ?>
<html>  
    <head>  
        <title>Liste étudiants</title>
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
                    <!-- Notre menu -->
                    <li><a href="../Accueil.php">Accueil</a></li>
                    <li><a href="../Cursus/Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="Ajout_etu.php">Etudiants</a></li>
                    <li><a href="Liste_etudiants.php">Associer étu/cursus </a></li>
                    <li><a href="Anciens_cours.php">Mes cursus</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
            </div>

            <div>
                <p><h1>Etudiants enregistrés</h1></p>

            </div>
            <p><i>Cliquez sur le nom de l'étudiant pour voir son statut, le modifier ou le supprimer</i></p>

            <form method="post" action="modif_etu.php">

                <label>Liste des étudiants dans la BDD</label><br />
                <select size="10" name="mon_etu">
                    <?php
                    //Affiche tous les étudiants de la base par ordre alphabétique
                    //EN PLUS,faire une fonction de recherche !!
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                        $reponse = $bdd->query('SELECT * FROM etudiant ORDER BY nom');
                        while ($donnees = $reponse->fetch()) {
                            ?>
                            <option> <?php echo $donnees['nom'] . ' ' . $donnees['prenom']; ?></option>
                            <?php
                        }
                        $reponse->closeCursor();
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    ?>
                </select>
                <p> <input type='submit' value='Modifier /supprimer cet étudiant'></p>
            </form> 
            <p>
            <form name="nouv_etu" action="Nouvel_etudiant.php" method="POST">
                <!-- Nous ouvre la page permettant d'ajouter un étu à la BDD -->
                <input type='submit' value='Ajouter un etudiant à la BDD'>
            </form>
        </p>
    </div>
</body>
</html>