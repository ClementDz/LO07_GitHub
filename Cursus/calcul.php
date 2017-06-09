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
                <p><h1>Calcul des crédits restants pour l'étudiant(e) <?php echo $_SESSION['nom']; ?></h1></p>
            </div>

            <h2>Règlement actuel</h2>
            <p>
            <ul>
                <li>Règle_1 : somme CS+TM de TCBR = 54 &rarr; <b> <?php calcul_deux_para('CS', 'TM', 'TCBR', 54); ?> </b></li>
                <li>Règle_2 : somme CS+TM de FCBR = 30 &rarr; <b> <?php calcul_deux_para('CS', 'TM', 'FCBR', 30); ?> </b></li>
                <li>Règle_3 : somme CS de BR = 30 &rarr; <b><?php calcul_un_para('CS', 'TCBR', 30); ?> CS de BR </b></li>
                <li>Règle_4 : somme TM de BR = 30 &rarr; <b><?php calcul_un_para('TM', 'BR', 30); ?> TM de BR </b></li>
                <li>Règle_5 : somme ST de TCBR = 30 &rarr; <b> <?php calcul_un_para('ST', 'TCBR', 30); ?>  ST de TCBR</b></li>
                <li>Règle_6 : somme ST de FCBR = 30 &rarr; <b><?php calcul_un_para('ST', 'FCBR', 30); ?>  ST de FCBR</b></li>
                <li>Règle_7 : somme EC de BR = 12 &rarr; <b> <?php calcul_un_para('EC', 'BR', 12); ?>  EC de BR</b></li>
                <li>Règle_8 : somme ME de BR = 4 &rarr; <b><?php calcul_un_para('ME', 'BR', 4); ?> ME de BR</b></li>
                <li>Règle_9 : somme CT de BR = 4 &rarr; <b><?php
                        calcul_un_para('CT', 'BR', 4);
                        ;
                        ?> </b></li>
                <li>Règle_10 : somme ME+CT de BR = 16 &rarr; <b><?php calcul_deux_para('ME', 'CT', 'BR', 16); ?> </b></li>
                <li>Règle_11 : somme UTT(CS+TM)	BR &rarr; <b><?php calcul_CS_TM_BR(); ?> </b></li>
                <li>Règle_12 : SE doit être fait </li>
                <li>Règle_13 : NPML doit être validé</li>
            </ul>
        </p>

        <h2>Règlement futur</h2>
        <p>
        <ul>
            <li>Règle_1 : somme CS+TM de TCBR = 42 &rarr; <b> <?php calcul_deux_para('CS', 'TM', 'TCBR', 42); ?> </b></li>
            <li>Règle_2 : somme CS+TM de FCBR = 18 &rarr; <b> <?php calcul_deux_para('CS', 'TM', 'FCBR', 18); ?> </b></li>
            <li>Règle_3 : somme CS de BR = 24 &rarr; <b><?php calcul_un_para('CS', 'BR', 24); ?> CS de BR </b></li>
            <li>Règle_4 : somme TM de BR = 24 &rarr; <b><?php calcul_un_para('TM', 'BR', 24); ?> TM de BR </b></li>
            <li>Règle_5 : somme CS+TM de BR = 84 &rarr; <b><?php calcul_deux_para('CS', 'TM', 'BR', 84); ?> TM de BR </b></li>
            <li>Règle_6 : somme ST de TCBR = 30 &rarr; <b> <?php calcul_un_para('ST', 'TCBR', 30); ?>  ST de TCBR</b></li>
            <li>Règle_7 : somme ST de FCBR = 30 &rarr; <b><?php calcul_un_para('ST', 'FCBR', 30); ?>  ST de FCBR</b></li>
            <li>Règle_8 : somme EC de BR = 12 &rarr; <b> <?php calcul_un_para('EC', 'BR', 12); ?>  EC de BR</b></li>
            <li>Règle_9 : somme ME de BR = 4 &rarr; <b><?php calcul_un_para('ME', 'BR', 4); ?> ME de BR</b></li>
            <li>Règle_10 : somme CT de BR = 4 &rarr; <b><?php calcul_un_para('CT', 'BR', 4);?> </b></li>
            <li>Règle_11 : somme ME+CT de BR = 16 &rarr; <b><?php calcul_deux_para('ME', 'CT', 'BR', 16); ?> </b></li>
            <li>Règle_12 : somme UTT(CS+TM) de BR = 60 &rarr; <b><?php calcul_deux_para('CS', 'TM', 'BR', 60); ?> </b></li>
            <li>Règle_13 : SE doit être fait </li>
            <li>Règle_14 : NPML doit être validé</li>
            <li>Règle_12 : somme = 180 &rarr; <b><?php calcul_total(); ?> </b></li>

        </ul>
    </p>
</div>
</body> 
</html>

<?php
$numero = $_SESSION['num_etu'];

// Va calculer les crédits restants par l'étudiant en fonction de la catégorie et de l'affectation
function calcul_un_para($categorie, $affectation, $total) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        //On récupère les cursus pour un certain numéro étudiant
        $reponse = $bdd->query("SELECT COALESCE(SUM(credit),0) 
FROM `semestre_element_formation`, `element_formation` 
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND `element_formation`.`categorie` = '$categorie' 
AND `element_formation`.`affectation` = '$affectation'
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.label_cursus = `cursus`.label_cursus AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
        //var_dump($reponse);
        //echo"test1";
        while ($somme = $reponse->fetch()) {
            //echo"test2";
            //var_dump($somme[0]);
            $restant = $total - $somme[0];
            if ($restant <= 0) {
                $restant = abs($restant);
                echo "Vous avez déjà validé " . $restant . " crédits de plus que necessaire";
            } else {
                echo "Il vous manque " . $restant . " crédits";
            }
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

// Va calculer les crédits restants par l'étudiant en fonction de 2 catégories et de l'affectation
function calcul_deux_para($categorie1, $categorie2, $affectation, $total) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        //On récupère les cursus pour un certain numéro étudiant
        $reponse = $bdd->query("SELECT COALESCE(SUM(credit),0) 
FROM `semestre_element_formation`, `element_formation` 
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND(`element_formation`.`categorie` = '$categorie1' OR `element_formation`.`categorie` = '$categorie2') 
AND `element_formation`.`affectation` = '$affectation'
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.label_cursus = `cursus`.label_cursus AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
        while ($somme = $reponse->fetch()) {
            $restant = $total - $somme[0];
            if ($restant <= 0) {
                $restant = abs($restant);
                echo "Vous avez déjà validé " . $restant . " crédits de plus que necessaire";
            } else {
                echo "Il vous manque " . $restant . " crédits";
            }
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function calcul_CS_TM_BR() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        //On récupère les cursus pour un certain numéro étudiant
        $reponse = $bdd->query("SELECT COALESCE(SUM(credit),0) 
FROM `semestre_element_formation`, `element_formation` 
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND(`element_formation`.`categorie` = 'CS' OR `element_formation`.`categorie` = 'TM') 
AND `element_formation`.`affectation` = 'BR'
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.label_cursus = `cursus`.label_cursus AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
        while ($somme = $reponse->fetch()) {

            echo $somme[0];
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function calcul_total() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        //On récupère les cursus pour un certain numéro étudiant
        $reponse = $bdd->query("SELECT COALESCE(SUM(credit),0) 
FROM `semestre_element_formation`, `element_formation` 
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.label_cursus = `cursus`.label_cursus AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
        while ($somme = $reponse->fetch()) {

            echo $somme[0];
        }
        $reponse->closeCursor();
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>