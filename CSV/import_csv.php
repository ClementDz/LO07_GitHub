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
                
                $req = $bdd->prepare('INSERT INTO semestre(sem_id, sem_seq, sem_label) VALUES(:sem_id, :sem_seq, :sem_label)');
                $req->execute(array(
                    //A voir pour le sem_id !!!
                    'sem_id' => 2,
                    'sem_seq' => $monfichier[$c + 1],
                    'sem_label' => $monfichier[$c + 2]
                ));

                $req = $bdd->prepare('INSERT INTO cursus(label_cursus, sem_id, num_etu) VALUES(:label_cursus, :sem_id, :num_etu)');
                $req->execute(array(
                    //A voir pour sem_id et label_cursus !!!
                    'label_cursus' => 2,
                    'sem_id' => 2,
                    'num_etu' => $numero_etudiant
                ));

                $req = $bdd->prepare('INSERT INTO semestre_element_formation(sem_id, sigle, resultat, credit, profil) VALUES(:sem_id, :sigle, :resultat, :credit, :profil)');
                $req->execute(array(
                    // A voir pour sem_id
                    'sem_id' => 2,
                    'sigle' => $monfichier[$c + 3],
                    'resultat' => $monfichier[$c + 9],
                    'credit' => $monfichier[$c + 8],
                    'profil' => $monfichier[$c + 7]
                ));

                $req = $bdd->prepare('INSERT INTO element_formation(sigle, affectation, categorie, utt) VALUES(:sigle, :affectation, :categorie, :utt)');
                $req->execute(array(
                    // A MODIFIER EN FONCTION
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

/*
  try {
  $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
  $row = 1;
  if (($handle = fopen("PRIOR_beatrice.csv", "r")) !== FALSE) {
  //$handle=preg_split($preg,$handle);
  while (($data = fgetcsv($handle, 82, ";")) !== FALSE) {
  $num = count($data);
  echo "<p> $num champs à la ligne $row: <br /></p>\n";
  $row++;
  for ($c = 0; $c < $num; $c++) {
  //echo $data[$c] . "<br />\n";

  }
  }
  fclose($handle);
  }
  /* Insertion du message à l'aide d'une requête préparée
  $req = $bdd->prepare('INSERT INTO element_formation(sigle, affectation, categorie, utt, profil) VALUES(:sigle, :affectation, :categorie, :utt, :profil)');
  $req->execute(array(
  'sigle' => $_POST['sigle'],
  'affectation' => $_POST['affectation'],
  'categorie' => $_POST['categorie'],
  'utt' => $_POST['utt'],
  'profil' => $_POST['profil']
  ));
  } catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
  } */
// faire une fonction Js alert() pour dire que ca a été importé avec succcès

/* LOAD DATA INFILE IGNORE 'data.txt' INTO TABLE tbl_name
  FIELDS TERMINATED BY ',' ENCLOSED BY '"'
  LINES TERMINATED BY '\n'; */
?>
