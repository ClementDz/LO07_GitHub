 <?php
session_start();// On démarre la session AVANT toute chose
?>
<!--Page contenant l'ensemble des éléments de formation-->
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
							<li><a href="a_propos">A propos de nous</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<section class="row">
			<div class="col-lg-12">
				<h1>Elements de formation</h1>
				<p class="lead">Sur cette page vous pouvez saisir de nouvelles UEs mais aussi consulter la liste des UEs deja existantes.</p>
			</div>
			<div class="col-lg-6">
				<h3>Ajout d'une nouvelle UE</h3>
				<p>
					<form method='post' action="../BaseDeDonnees/add_cours.php">
						<!-- Formulaire pour ajouter une UE dans la BDD -->
						<fieldset>
							<i> Veuillez remplir le formulaire :</i><br/>

							<p>
								<label>Sigle de l'UE</label>
								<input type="text" name="sigle" required placeholder='ex : ST09, LO07, BULE'/>
							</p>
							<p>
								<label>Catégorie</label>
								<input type='radio' name="categorie" value="CS" required/>CS
								<input type='radio' name="categorie" value="TM" required/>TM
								<input type='radio' name="categorie" value="EC" required/>EC
								<input type='radio' name="categorie" value="ME" required/>ME
								<input type='radio' name="categorie" value="HT" required/>HT
								<input type='radio' name="categorie" value="NPML" required/>NPML

							</p>

							<p>
								<label>Affectation</label>
								<input type='radio' name="affectation" value="TC" required/>TC
								<input type='radio' name="affectation" value="TCBR" required/>TCBR
								<input type='radio' name="affectation" value="FCBR" required/>FCBR

							</p>

							<p>
								<label>L'UE a t-elle été suivie à l'UTT?</label>
								<input type='radio' name="utt" value="Y" required/>Oui
								<input type='radio' name="utt" value="N" required/>Non
							</p>


						</fieldset>

						<p> 
							<input type='submit' value='Ajouter cette UE'>
							<input type='reset' value='Réinitialiser'>
						</p>
					</form>
					<a href="page_modif_cursus.php" class="button">Retourner à mon cursus</a>
				</p>
			</div>
			<div class="col-lg-6">
				<h3>Liste des UEs existantes:</h3>
				<form method="post" action="../BaseDeDonnees/delete_uv.php">
					<label>Voici la liste des UEs deja enregistrées</label><br/>
					<select size="10" name="mon_UE">
						<?php
                        //Affiche toutes les UEs de la base par ordre alphabétique
						try {
							$bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
							$reponse = $bdd->query('SELECT sigle FROM element_formation ORDER BY sigle');
							while ($donnees = $reponse->fetch()) {
								?>
								<option> <?php echo $donnees['sigle']; ?></option>
								<?php
							}
							$reponse->closeCursor();
						} catch (Exception $e) {
							die('Erreur : ' . $e->getMessage());
						}
						?>
					</select>
					<p> <input type="submit" value="Supprimer cette UE"></p>

				</form>
			</div>
		</section>
	</div>
</body>
</html>

<?php

// Afficher les infos sur l'étudiant sélectionné
function etu_selec() {
    if (isset($_POST['mon_etu'])) {
        $etudiant = $_POST['mon_etu'];
        print_r('<i>' . $etudiant . '</i>');
// Lecture session = est elle définie ?
        if (isset($_SESSION)) {
//on récupère son nom dans une var de session
            $_SESSION['nom'] = $etudiant;
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
//on récupère son num_etu dans une var de session
            $reponse2 = $bdd->query('SELECT num_etu FROM etudiant');
            $donnees = $reponse2->fetchColumn();
            $_SESSION['num_etu'] = $donnees;
        }
    } elseif (isset($_SESSION['nom'])) {
        print_r('<i>' . $_SESSION['nom'] . '</i>');
    } else {
        echo'Erreur, veuillez resélectionner un étudiant';
    }
}

// Fonction permettant de récupérer les infos sur l'admi + filiere
function recupere_infos_etu() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        if (isset($_SESSION['num_etu'])) {
            $reponse2 = $bdd->query('SELECT admi, filiere FROM etudiant WHERE num_etu="' . $_SESSION['num_etu'] . '"');
            $donnees2 = $reponse2->fetch();
            $_SESSION['admi'] = $donnees2['admi'];
            $_SESSION['filiere'] = $donnees2['filiere'];
            $reponse2->closeCursor();
        }
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
?>