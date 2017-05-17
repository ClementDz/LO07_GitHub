<?php

//Ouvrir un fichier
//r+ = lecture et écriture
var_dump(isset($_FILES['import']));
//$monfichier = fopen('PRIOR_beatrice.csv','r+');
//Fermer le fichier
//fclose($monfichier);

echo'test';



try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
    $row = 1;
    if (($handle = fopen("PRIOR_beatrice.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle,82,";")) !== FALSE) {
            $num = count($data);
            echo "<p> $num champs à la ligne $row: <br /></p>\n";
            $row++;
            for ($c = 0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
                switch ($data[$c]) {
                    case "ID" :
                        echo "ligne ID";
                        break;
                    case "resultat EL":
                        echo"ligne element";
                        break;
                    default :
                        //echo "pas de ligne ID";
                }
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
      )); */
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// faire une fonction Js alert() pour dire que ca a été importé avec succcès

/* LOAD DATA INFILE IGNORE 'data.txt' INTO TABLE tbl_name
  FIELDS TERMINATED BY ',' ENCLOSED BY '"'
  LINES TERMINATED BY '\n'; */
?>
