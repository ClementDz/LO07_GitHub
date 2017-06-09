<?php

// Récupérer le nom du fichier
$file = file_get_contents("PRIOR_beatrice.csv");
//On va supprimer les blancs points virgules etc etc etc
$preg = "/[\n,\r,\r\n,;]+/";
$monfichier = preg_split($preg, $file);
$long = count($monfichier);

//On se connecte a la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    for ($c = 0; $c < $long; $c++) {
        echo $monfichier[$c] . "<br/>";
        switch ($monfichier[$c]) {
            case "ID" :
                //echo "<b>ligne ID</b>";
                //Enregistrer les infos étudiantes dans la BDD
                $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, num_etu, admi, filiere, email) VALUES(:nom, :prenom, :num_etu, :admi, :filiere, :email)');
                $req->execute(array(
                    'num_etu' => $monfichier[$c + 1],
                    'nom' => $monfichier[$c + 3],
                    'prenom' => $monfichier[$c + 5],
                    'admi' => $monfichier[$c + 7],
                    'filiere' => $monfichier[$c + 9],
                    //Il n'y aura jamais de mail dans les csv
                    'email' => ""
                ));
                $numero_etudiant = $monfichier[$c + 1];
                break;
            
            case "EL":
                echo"<b>ligne element</b>";
                //Enregistrer les informations sur les éléments associé à l'étudiant
                
                $req = $bdd->prepare('INSERT INTO semestre(sem_seq, sem_label, label_cursus) VALUES(:sem_seq, :sem_label, :label_cursus)');
                $req->execute(array(
                    'sem_seq' => $monfichier[$c + 1],
                    'sem_label' => $monfichier[$c + 2],
                    'label_cursus' => 2
                ));

                $req = $bdd->prepare('INSERT INTO cursus(label_cursus, num_etu) VALUES(:label_cursus, :num_etu)');
                $req->execute(array(
                    //Label cursus a faire +1 du dernier
                    'label_cursus' => 2,
                    'num_etu' => $numero_etudiant
                ));

                $req = $bdd->prepare('INSERT INTO semestre_element_formation(sigle, resultat, credit, profil) VALUES(:sigle, :resultat, :credit, :profil)');
                $req->execute(array(
                    'sigle' => $monfichier[$c + 3],
                    'resultat' => $monfichier[$c + 9],
                    'credit' => $monfichier[$c + 8],
                    'profil' => $monfichier[$c + 7]
                ));

                $req = $bdd->prepare('INSERT INTO element_formation(sigle, affectation, categorie, utt) VALUES(:sigle, :affectation, :categorie, :utt)');
                $req->execute(array(
                    
                    'sigle' => $monfichier[$c + 3],
                    'affectation' => $monfichier[$c + 5],
                    'categorie' => $monfichier[$c + 4],
                    'utt' => $monfichier[$c + 6]
                ));
                break;
            default :
            //echo "pas de ligne ID";
        }
    }
    ?>
    <script>
        alert('Fichier bien importé');
    </script>
    <?php

//fclose($file);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//header('Location: ../Etudiant/Anciens_cours.php');
?>
