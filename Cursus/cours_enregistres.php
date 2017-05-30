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
                    <li><a href="Liste_cursus.php">Futurs cours</a></li>
                    <li><a href="../Etudiant/Ajout_etu.php">Etudiants</a></li>
                    <li><a href="../Etudiant/Liste_etudiants.php">Associer étu/cursus </a></li>
                    <li><a href="cours_enregistres.php">Cours enregistrés</a></li>
                    <!-- A ne pas montrer dans la version finale -->
                    <li><a href="../Auteurs_contact.php">Auteurs</a></li>
                    <li><a href="../Sources.php">Sources</a></li>
                    <li><a href="../Reglement/Les reglements.php">Règlements</a></li>
                </ul>
                <br class="clearfix" />
            </div>

            
        <p><h1>Voici la liste des cours enregistrés dans notre base</h1></p>
    <i>Si l'UE souhaitée n'est pas dans la liste, veuillez l'ajouter manuellement</i>
    <p><form method="post" action="Ajout_cours.php" name="UE_ajout_rapide">
        <!-- Cours enregistrés dans la BDD -->
        <select name="ue_pre_remplies" size="10">
            <?php
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            //On récupère tous les cours précédemment rentrés
            $reponse = $bdd->query('SELECT * FROM element_formation');
            while ($donnees = $reponse->fetch()) {
                ?>
                <option> <?php echo $donnees['sigle']; ?></option>
                <?php
            }
            $reponse->closeCursor();
            ?>
        </select>
        <p><input type='button' value='Ajouter une UE à la BDD' id="manuel" onclick="manuellement();"></p>
        <!-- Va nous afficher, retirer l'attribut hidden des formulaires  -->
    </form></p>


<form method='post' action="../BDD/add_cours.php" hidden id="ajout_manuel2">
    <fieldset>
        <legend>Ajout d'une UE</legend>

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

        <p>
            <label>L'UE appartient-elle au profil de votre branche/filière?</label>
            <input type='radio' name="profil" value="Y" required/>Oui
            <input type='radio' name="profil" value="N" required/>Non
        </p>

    </fieldset>

    <p> <input type='submit' value='Ajouter cette UE à la BDD' onclick="automatiquement();">
        <!-- Si submit cliqué alors stockage BDD + affichage dans la liste du dessus !!
        on peut en rentrer une autre -->
        <input type='reset' value='Réinitialiser'>
</form>




<script type="text/javascript">
    //fonction Js permettant supprimer element hidden du form
    function manuellement() {
        var y = document.getElementById("ajout_manuel2");
        y.style.display = "inline";
    }
    // Cacher l'ajout d'un element manuellement
    function automatiquement() {
        var y = document.getElementById("ajout_manuel2");
        y.style.display = "hidden";
    }
</script> 



</body>  
</html>
