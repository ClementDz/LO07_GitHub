<?php
session_start();
?>
<!--Page de calcul d'UV-->
<html>
<head>
<link href="../CSS/bootstrap/css/bootstrap.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../CSS/bootstrap/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
<header class="page-header">
<div class="col-sm-12">
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="accueil.php">Testeur de Cursus</a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="accueil.php">Accueil</a></li>
<li><a href="page_etudiant.php">Etudiants</a></li>
<li><a href="page_UV.php">UEs</a></li>
<li><a href="reglements.php">Reglements</a></li>
<li><a href="a_propos.php">A propos de nous</a></li>
</ul>
</div>
</nav>
</div>
</header>
<section class="row">
<div class="col-sm-12">

<div>
<p><h1>Calcul des crédits restants pour l'étudiant(e) <?php echo $_SESSION['nom']; ?></h1></p>
</div>

<div>
<h3>Calcul pour le cursus : <?php cursus_selec(); ?></h3>
</div>

<p>
<a href="../PagesWeb/page_modif_cursus.php" class="button">Retour au cursus</a>
</p>

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
<td><?php calcul_un_para_BR('CS', 30); ?>/30</td>
</tr>
<tr>
<td>4</td>
<td>somme TM de BR</td>
<td><?php calcul_un_para_BR('TM', 30); ?>/30</td>
</tr>
<tr>
<td>5</td>
<td>somme CS+TM de BR</td>
<td><?php calcul_CS_TM_BR('CS', 'TM', 84); ?>/84</td>
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
<td><?php calcul_CS_TM_BR_UTT(); ?></td>
</tr>
<tr>
<td>12</td>
<td>SE doit être fait</td>
<td><?php SE(); ?></td>
</tr>
<tr>
<td>13</td>
<td>NPML doit être validé</td>
<td><?php NPML(); ?></td>
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
<td><?php calcul_un_para_BR('CS', 24); ?>/24</td>
</tr>
<tr>
<td>4</td>
<td>somme TM de BR</td>
<td><?php calcul_un_para_BR('TM', 24); ?>/24</td>
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
<td><?php calcul_CS_TM_UTT(); ?></td>
</tr>
<tr>
<td>13</td>
<td>SE doit être fait</td>
<td><?php SE(); ?></td>
</tr>
<tr>
<td>14</td>
<td>NPML doit être validé</td>
<td><?php NPML(); ?></td>
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
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
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

function calcul_un_para_BR($categorie, $total) {
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
//On récupère les cursus pour un certain numéro étudiant
$reponse = $bdd->query("SELECT COALESCE(SUM(credit),0)
FROM `semestre_element_formation`, `element_formation`
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND `element_formation`.`categorie` = '$categorie'
AND (`element_formation`.`affectation` = 'FCBR' OR `element_formation`.`affectation` = 'TCBR')
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
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
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
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
AND (`element_formation`.`affectation` = 'TCBR' OR `element_formation`.`affectation` = 'FCBR')
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
while ($somme = $reponse->fetch()) {
echo $somme[0];
}
$reponse->closeCursor();
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
}

function calcul_CS_TM_BR_UTT() {
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
//On récupère les cursus pour un certain numéro étudiant
$reponse = $bdd->query("SELECT COALESCE(SUM(credit),0)
FROM `semestre_element_formation`, `element_formation`
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND(`element_formation`.`categorie` = 'CS' OR `element_formation`.`categorie` = 'TM')
AND (`element_formation`.`affectation` = 'TCBR' OR `element_formation`.`affectation` = 'FCBR')
AND `element_formation`.utt = 'Y'
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
while ($somme = $reponse->fetch()) {
echo $somme[0];
}
$reponse->closeCursor();
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
}

function calcul_CS_TM_UTT() {
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
//On récupère les cursus pour un certain numéro étudiant
$reponse = $bdd->query("SELECT COALESCE(SUM(credit),0)
FROM `semestre_element_formation`, `element_formation`
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND(`element_formation`.`categorie` = 'CS' OR `element_formation`.`categorie` = 'TM')
AND `element_formation`.utt = 'Y'
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
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
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id AND `cursus`.num_etu = `etudiant`.num_etu
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
while ($somme = $reponse->fetch()) {

echo $somme[0];
}
$reponse->closeCursor();
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
}

function NPML() {
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
//On récupère les cursus pour un certain numéro étudiant
$reponse = $bdd->query("SELECT resultat
FROM `semestre_element_formation`, `element_formation`
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id
AND `cursus`.num_etu = `etudiant`.num_etu
AND `semestre_element_formation`.sigle = 'BULE'
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
while ($somme = $reponse->fetchColumn()) {
if (isset($somme) && $somme = 'ADM') {
echo 'Validé';
} else {
echo 'Pas encore validé';
}
}
$reponse->closeCursor();
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
}

function SE() {
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
//On récupère les cursus pour un certain numéro étudiant
$reponse = $bdd->query("SELECT resultat
FROM `semestre_element_formation`, `element_formation`
WHERE `semestre_element_formation`.`sigle` = `element_formation`.`sigle`
AND `semestre_element_formation`.`sem_id`IN (SELECT DISTINCT `semestre`.sem_id FROM `cursus`, `semestre`, `etudiant` WHERE `semestre`.id_cursus = `cursus`.cursus_id
AND `cursus`.num_etu = `etudiant`.num_etu
AND `semestre_element_formation`.sigle = 'SE'
AND `etudiant`.num_etu = " . $_SESSION['num_etu'] . ")");
while ($somme = $reponse->fetchColumn()) {
if (isset($somme) && $somme = 'ADM') {
echo 'Fait';
} else {
echo 'Pas encore fait';
}
}
$reponse->closeCursor();
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
}

function cursus_selec() {
if (isset($_POST['mon_cursus'])) {
$cursus = $_POST['mon_cursus'];
print_r('<i>' . $cursus . '</i>');
// Lecture session = est elle définie ?
if (isset($_SESSION)) {
//on récupère son nom dans une var de session
$_SESSION['mon_cursus'] = $cursus;
try {
$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
} catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
//on récupère son num_etu dans une var de session

/* $couper = explode(" ", $etudiant);
$nom = $couper[0];
$prenom = $couper[1];

$reponse2 = $bdd->query('SELECT num_etu FROM etudiant WHERE nom="'.$nom.'" AND prenom="'.$prenom.'"');
$donnees = $reponse2->fetchColumn();
$_SESSION['num_etu'] = $donnees;
echo $_SESSION['num_etu']; */
}
} elseif (isset($_SESSION['mon_cursus'])) {
print_r('<i>' . $_SESSION['mon_cursus'] . '</i>');
} else {
echo'Erreur, veuillez resélectionner un cursus';
}
}
?>
</div>
</section>
</div>
</body>
</html>