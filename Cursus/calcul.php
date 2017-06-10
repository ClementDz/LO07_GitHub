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
            <table border = 4 width=100%>
                <tr>
                    <th>Numéro</th>
                    <th>Règle</th>
                    <th>Résultat</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>somme CS+TM de TCBR</td>
                    <td><?php calcul_deux_para('CS', 'TM', 'TCBR', 54); ?>/54</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>somme CS+TM de FCBR</td>
                    <td><?php calcul_deux_para('CS', 'TM', 'FCBR', 30); ?>/30</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>somme CS de BR</td>
                    <td><?php calcul_un_para('CS', 'TCBR', 30); ?>/30</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>somme TM de BR</td>
                    <td><?php calcul_un_para('TM', 'BR', 30); ?>/30</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>somme CS+TM de BR</td>
                    <td><?php calcul_deux_para('CS', 'TM', 'BR', 84); ?>/84</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>somme ST de FCBR</td>
                    <td><?php calcul_un_para('ST', 'FCBR', 30); ?>/30</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>somme EC de BR</td>
                    <td><?php calcul_un_para('EC', 'BR', 12); ?>/12</td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>somme ME de BR</td>
                    <td><?php calcul_un_para('ME', 'BR', 4); ?>/4</td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>somme CT de BR</td>
                    <td><?php calcul_un_para('CT', 'BR', 4); ?>/4</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>somme ME+CT de BR</td>
                    <td><?php calcul_deux_para('ME', 'CT', 'BR', 16); ?>/16</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>somme UTT(CS+TM)BR</td>
                    <td><?php calcul_CS_TM_BR(); ?></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td>SE doit être fait</td>
                    <td><?php ?></td>
                </tr>
                <tr>
                    <td>13</td>
                    <td>NPML doit être validé</td>
                    <td><?php ?></td>
                </tr>
            </table>

        </p>

        <h2>Règlement futur</h2>
        <p>

        <table border = 4 width=100%>
            <tr>
                <th>Numéro</th>
                <th>Règle</th>
                <th>Résultat</th>
            </tr>

            <tr>
                <td>1</td>
                <td>somme CS+TM de TCBR</td>
                <td><?php calcul_deux_para('CS', 'TM', 'TCBR', 42); ?>/42</td>
            </tr>
            <tr>
                <td>2</td>
                <td>somme CS+TM de FCBR</td>
                <td><?php calcul_deux_para('CS', 'TM', 'FCBR', 18); ?>/18</td>
            </tr>
            <tr>
                <td>3</td>
                <td>somme CS de BR</td>
                <td><?php calcul_un_para('CS', 'BR', 24); ?>/24</td>
            </tr>
            <tr>
                <td>4</td>
                <td>somme TM de BR</td>
                <td><?php calcul_un_para('TM', 'BR', 24); ?>/24</td>
            </tr>
            <tr>
                <td>5</td>
                <td>somme CS+TM de BR</td>
                <td><?php calcul_deux_para('CS', 'TM', 'BR', 84); ?>/84</td>
            </tr>
            <tr>
                <td>6</td>
                <td>somme ST de TCBR</td>
                <td><?php calcul_un_para('ST', 'TCBR', 30); ?>/30</td>
            </tr>
            <tr>
                <td>7</td>
                <td>somme ST de FCBR</td>
                <td><?php calcul_un_para('ST', 'FCBR', 30); ?>/30</td>
            </tr>
            <tr>
                <td>8</td>
                <td>somme EC de BR</td>
                <td><?php calcul_un_para('EC', 'BR', 12); ?>/12</td>
            </tr>
            <tr>
                <td>9</td>
                <td>somme ME de BR</td>
                <td><?php calcul_un_para('ME', 'BR', 4); ?>/4</td>
            </tr>
            <tr>
                <td>10</td>
                <td>somme CT de BR</td>
                <td><?php calcul_un_para('CT', 'BR', 4); ?>/4</td>
            </tr>
            <tr>
                <td>11</td>
                <td>somme ME+CT de BR</td>
                <td><?php calcul_deux_para('ME', 'CT', 'BR', 16); ?>/16</td>
            </tr>
            <tr>
                <td>12</td>
                <td>somme UTT(CS+TM)</td>
                <td><?php calcul_deux_para('CS', 'TM', 'BR', 60); ?></td>
            </tr>
            <tr>
                <td>13</td>
                <td>SE doit être fait</td>
                <td><?php ?></td>
            </tr>
            <tr>
                <td>14</td>
                <td>NPML doit être validé</td>
                <td><?php ?></td>
            </tr>
             <tr>
                <td>15</td>
                <td>Somme</td>
                <td><?php calcul_total(); ?>/180</td>
            </tr>
        </table>
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
            echo $somme[0];
            /* if ($restant <= 0) {
              $restant = abs($restant);
              echo "Vous avez déjà validé " . $restant . " crédits de plus que necessaire";
              } else {
              echo "Il vous manque " . $restant . " crédits";
              } */
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
            echo $somme[0];
            /* if ($restant <= 0) {
              $restant = abs($restant);
              echo "Vous avez déjà validé " . $restant . " crédits de plus que necessaire";
              } else {
              echo "" . $restant . "";
              } */
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