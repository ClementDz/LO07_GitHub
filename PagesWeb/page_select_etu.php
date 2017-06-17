<?php
session_start();// On démarre la session AVANT toute chose
?>
<!--Page permettant de sélectionner un étudiant à modifier-->
<!doctype html>
<html>
<head>
	<link href="../CSS/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../CSS/bootstrap/js/bootstrap.js"></script> 
</head>

<body>
	<div class="container">
		<header class="page-header"> <!-- Pour le menu, nous avons utiliser la template de base de Bootstrap -->
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
							<li><a href="a_propos">A propos de nous</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<section class="row">
			<div>
				<p><h1>Etudiants enregistrés</h1></p>

			</div>
			<p><i>Cliquez sur le nom de l'étudiant pour voir son statut, le modifier ou le supprimer</i></p>

			<form method="post" action="page_modif_supp_etu.php">

				<label>Liste des étudiants dans la BDD</label><br />
				<select size="10" name="mon_etu">
					<?php
                    //Affiche tous les étudiants de la base par ordre alphabétique
                    //Nous avons créer un second formulaire afin de modifier ou de supprimer un étudiant.
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
				<form name="nouv_etu" action="page_etudiant.php" method="POST">
					<!-- Nous ouvre la page permettant d'ajouter un étu à la BDD -->
					<input type='submit' value='Retour'>
				</form>
			</p>
			</section>
</body>
</html>