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

            <div>
                <p><h1>Etudiants enregistrés</h1></p>
            <i>Cliquez sur le nom de l'étudiant pour le modifier ou le supprimer</i>

                <form method="post" action="###.php">

                    <label>Liste des étudiants dans la BDD</label><br />
                    <select size="10">
                        <?php
                        try {
                            $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        $reponse = $bdd->query('SELECT * FROM base_etu');
                        while ($donnees = $reponse->fetch()) {
                            ?>
                        <option> <?php echo $donnees['nom'].'&nbsp;'. $donnees['prenom']; ?></option>
                            <?php
                        }
                        $reponse->closeCursor();
                        ?>
                    </select>
                </form> 
                    <form name="nouv_etu" action="Nouvel_etudiant.php" method="POST">
                        <p> <input type='submit' value='Ajouter un etudiant'></p>
                    </form>
            </div>

    </body>
</html>

<?php ?>