<?php

// Récupérer le nom du fichier
$file = file_get_contents("PRIOR_beatrice.csv");
$preg = "/[\n,\r,\r\n,;]+/";
$monfichier = preg_split($preg, $file);
//var_dump($test);
$long = count($monfichier);
//echo $long;
//On se connecte a la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    for ($c = 0; $c < $long; $c++) {
        echo $monfichier[$c] . "<br/>";
        switch ($monfichier[$c]) {
            case "ID" :
                echo "<b>ligne ID</b>";
                //Enregistrer les infos étudiantes dans la BDD
                break;
            case "EL":
                echo"<b>ligne element</b>";
                //Enregistrer les informations sur les éléments associé à l'étudiant
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
