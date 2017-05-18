<?php session_start(); ?>
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
                    <li><a href="../Etudiant/Anciens_cours.php">Mes cursus</a></li>
                    <li><a href="../Auteurs_contact.php">Auteurs </a></li>
                    <li><a href="../Sources.php">Sources </a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            <div>
                <p><h1>Calcul des crédits restants pour l'étudiant(e) <?php echo$_SESSION['nom']; ?></h1></p>
            </div>
            
            <p>
            <ul>
                <li>Règle_1 : somme CS+TM de TCBR = 54 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_2 : somme CS+TM de FCBR = 30 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_3 : somme CS de BR = 30 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_4 : somme TM de BR = 30 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_5 : somme ST de TCBR = 30 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_6 : somme ST de FCBR = 30 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_7 : somme EC de BR = 12 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_8 : somme ME de BR = 4 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_9 : somme CT de BR = 4 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_10 : somme ME+CT de BR = 16 &rarr; <b>Il vous manque <?php echo(30); ?> crédits</b></li>
                <li>Règle_11 : somme UTT(CS+TM)	BR</li>
                <li>Règle_12 : SE doit être fait </li>
                <li>Règle_13 : NPML doit être validé</li>
            </ul>
            </p>
    </div>
</body> 
</html>
<?php
$numero = $_SESSION['num_etu'];
try {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            //On récupère les cursus pour un certain numéro étudiant
            $reponse = $bdd->query('SELECT * FROM cursus WHERE num_etu="' . $numero . '"');
            while ($donnees = $reponse->fetch()) {
                 echo $donnees['sigle'];
            }
            $reponse->closeCursor();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
?>