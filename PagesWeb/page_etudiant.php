<?php
session_start();// On démarre la session AVANT toute chose
?>
<!--Page contenant les étudiants du site-->
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
			<div class="col-lg-12">
				<h1>Etudiants</h1>
				<p class="lead">Sur cette page vous pouvez saisir vos données étudiantes mais aussi consulter la liste des étudiants déjà présents.</p>
				<div class="col-lg-6">
					<form method="post" action="../BaseDeDonnees/add_etu.php"> <!-- Formulaire d'ajout d'un étudiant à la BDD -->
						<fieldset>
							<legend>Données étudiantes</legend>
							<i>Veuillez saisir les informations suivantes</i>
							<p> <label>Nom</label>
								<input type="text" name="nom" id="nom" required placeholder='ex : Durnez, Dubois'/>            
							</p>

							<p>
								<label>Prénom</label>
								<input type="text" name="prenom" id="prenom" required placeholder='ex : Clement, Alexandre'/>
							</p>
							<p>
								<label>Numéro étudiant</label>
								<input type="text" name="num_etu" id="num_etu" required placeholder='ex : 38243'/>
							</p>
							<p>
								<label>Admission</label>
								<input type="radio" name="admi" value="TC" id="admi" required/>TC
								<input type="radio" name="admi" value="Branche" id="admi" required>Branche

							</p>
							<p>
								<label>Votre filière actuelle</label>
								<input type="radio" name="filiere" id="filiere" value="TC" required onclick="affichepas()"/>TC
								<input type="radio" name="filiere" id="filiere" value="TCBR" required onclick="affichepas()"/>TCBR
								<input type="radio" name="filiere" id="filiere" value="FI" required onclick="affiche();"/>Filière
							</p>

							<div id="ad"> </div>
							<div id="ad1"> </div>
							<div id="ad2"> </div>
							<div id="ad9"> </div>
							<div id="ad10"> </div>
							<div id="ad5"> </div>

							<!-- Script permettant d'afficher les filières, selon si la case Filière est cochée ou non  -->
							<script type="text/javascript"> 
								function affiche() {
									document.getElementById("ad").innerHTML = "<p>";
									document.getElementById("ad1").innerHTML = "<input type='radio' name='filiere' value='MSI'/>MSI";
									document.getElementById("ad2").innerHTML = "<input type='radio' name='filiere' value='MPL'/>MPL";
									document.getElementById("ad9").innerHTML = "<input type='radio' name='filiere' value='MRI'/>MRI";
									document.getElementById("ad10").innerHTML = "<input type='radio' name='filiere' value='Libre'/>Libre";
									document.getElementById("ad5").innerHTML = "</p>";
								}

							</script>  
							<script type="text/javascript">
								function affichepas() {
									document.getElementById("ad").innerHTML = "";
									document.getElementById("ad1").innerHTML = "";
									document.getElementById("ad2").innerHTML = "";
									document.getElementById("ad9").innerHTML = "";
									document.getElementById("ad10").innerHTML = "";
									document.getElementById("ad5").innerHTML = "";
								}
							</script>
						</p>

						<p>
							<label>Email</label>
							<input type="email" name="email" id="email" />
						</p>
						<p> <input type='submit' value="Ajouter l'étudiant"></p>
						<p> <input type="reset" value="Annuler" name=""></p>
					</fieldset>
				</form>
			</div>
			<div class="col-lg-6">
				<form method="post" action="../PagesWeb/page_cursus.php">
					<label>Liste des étudiants dans la BDD</label><br />
					<select size="10" name="mon_etu">
						<?php
                        //Affiche tous les étudiants de la base par ordre alphabétique
						try {
							$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8','root','');
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
						<p><input type="submit" value="Voir les cursus de cet etudiant"></p>
				</form> 
				<form method="post" action="../PagesWeb/page_select_etu.php" class="select_etu">
				<p> <input type='submit' value='Modifier un etudiant'></p>
				</form>
				<fieldset>
					<legend>Importation d'un cursus au format CSV</legend>
					<form name="import_csv" action="../CSV/import_csv.php" method="POST">
						<p> <input name="import"type="file" value="Importer au format CSV"></p>
						<p> <input type='submit' value='Importer'></p>
					</form>
				</fieldset>
				<?php
				validmail();
				//affiche_form();

        		// Connexion à la base de données
				try {
					$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8','root','');
				} catch (Exception $e) {

					echo('Ne se connecte pas');
					die('Erreur : ' . $e->getMessage());

				}

        		// Récupération des 10 derniers messages
				$reponse = $bdd->query('SELECT nom, prenom, num_etu, admi, filiere, email FROM etudiant');
				$reponse->closeCursor();

				?>
			</div>
		</div>
	</section>
</div>
</body>
</html>

<?php

//valide le format d'une adresse email
function validmail() {
    if (isset($_POST["email"])) {
        $email_valide = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        if ($email_valide === FALSE) {
            echo("$_POST[email] n'est pas valide \n");
        } else {
            echo("$_POST[email] est valide \n");
        }
    }
}

//affiche le nom et le prenom que l'on récupère
//function affiche_form() {
//    foreach ($_POST as $name => $value) {
//        if (is_array($value)) {
//            echo("<li>" . $name . "=" . implode(',', $value) . "</li>");
//        } else {
//            echo("<li>" . $name . "=" . $value . "</li>");
//        }
//    }
//}
?>