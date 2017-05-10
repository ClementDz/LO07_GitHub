<?php session_start(); ?>
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
                    <li><a href="../Cursus/Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="Liste_etudiants.php">Etudiants</a></li>
                    <li><a href="Anciens_cours.php">Mes cursus</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <p><h1>Ajout de cours pour l'étudiant <?php echo $_SESSION['nom']; ?></h1></p>
        <p><h2>Ajout de  <?php cours_selec(); ?> au cursus</h2></p>

    <form method='post' action="../BDD/add_cursus.php">
        <fieldset>
            <legend>Résultat à l'UE</legend>
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
            <p>
                <label>Numéro du semestre <i>(ex: "1" si 1er semestre d'ISI)</i></label>
                <input type='radio' name="sem_seq" value="1" required/>1
                <input type='radio' name="sem_seq" value="2" required/>2
                <input type='radio' name="sem_seq" value="3" required/>3
                <input type='radio' name="sem_seq" value="4" required/>4
                <input type='radio' name="sem_seq" value="5" required/>5
                <input type='radio' name="sem_seq" value="6" required/>6

            </p>
            <p>
                <label>Label du semestre </label>
                <input type="text" name="sem_label" required placeholder="ex : TC04, ISI2..."/>
            </p>
            <input type='submit' value="Valider cette UE">
            <input type='reset' value='Réinitialiser'>
            </form>
            <?php
            //echo$_SESSION['nom'];
            //var_dump($_SESSION['num_etu']);
            //var_dump($_SESSION['label_cursus']);
            ?>
            </div>
            </body>
            </html>

            <?php
            function cours_selec(){
                if (isset($_POST['ue_pre_remplies'])) {
                $cours = $_POST['ue_pre_remplies'];
                print_r('<i>' . $cours . '</i>');

                    if (isset($_SESSION)) {
                    //connexion
                            try {
                            $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
                            } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                            }
                    //Récupérer les données des        
                    $reponse = $bdd->query('SELECT sigle, affectation FROM element_formation WHERE sigle="'.$cours.'"');
                    //$reponse->execute();
                    //On enregistre en les donneés dans les var de sessions pour les enregistrer plus tard dans la BDD
                    $donnees = $reponse->fetchColumn(1);
                    $_SESSION['affectation'] = $donnees;
                    
                    //Celle ci ne marche pas ...
                    $donnees = $reponse->fetchColumn();
                    var_dump($_SESSION['sigle'] = $donnees);
                    
                    }
            } else
            echo'Erreur, veuillez resélectionner un cours';
            }
            ?>