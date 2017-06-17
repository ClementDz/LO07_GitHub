<?php
// Vive le code optimisé :D
// 
// 
// 
// 
// 
// Récupérer le nom du fichier
$file = file_get_contents("PRIOR_beatrice.csv");
//On va supprimer les blancs points virgules etc etc etc
$preg = "/[\n,\r,\r\n,;]+/";
$monfichier = preg_split($preg, $file);
$long = count($monfichier);

echo "coucou \n";
echo "coucou \n";
echo "coucou \n";
echo "coucou \n";
echo "coucou \n";
echo "coucou \n";
echo "coucou \n";
echo "coucou \n";

//On se connecte a la base de donnée
$i = 0;
while ($i <= 3) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');
        //creation d'un cursus pour l'etudiant importe
// ON FAIT UN TOUR QUI NENREGISTRE RIEN MAIS RECUPERER NUM ETU ET NOM
        for ($c = 0; $c < $long; $c++) {
            echo $monfichier[$c] . "<br/>";
            switch ($monfichier[$c]) {
                case "ID" :
                    $numero_etudiant = $monfichier[$c + 1];
                    $nom = $monfichier[$c + 3];
                    break;
                default :
                //echo "pas de ligne ID";
            }
            try {
                $reponse = $bdd->query('SELECT cursus_id FROM cursus WHERE num_etu="' . $numero_etudiant . '" ');

                while ($donnees = $reponse->fetchcolumn()) {
                    var_dump($donnees);
                    $cursus_id = $donnees;
                }
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }

        if ($i <= 1) {
            //creation du cursus
            $req = $bdd->prepare('INSERT INTO cursus (num_etu, label_cursus) VALUES( :num_etu, :label_cursus)');
            $req->execute(array(
                'label_cursus' => 'cursus_' . $nom . '',
                'num_etu' => $numero_etudiant
            ));
            //$i = $i +1;
        }



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
                    $nom = $monfichier[$c + 3];
                    $prenom = $monfichier[$c + 5];
                    //$i = $i +1;
                    break;

                case "EL":
                    echo"<b>ligne element</b>";
                    //Enregistrer les informations sur les éléments associé à l'étudiant
                    if ($i <= 2) {

                        //Recupère derniers sem_label pour un id_cursus
                        try {
                            $reponse = $bdd->query('SELECT sem_label FROM semestre WHERE id_cursus="' . $cursus_id . '" ');

                            while ($donnees = $reponse->fetchcolumn()) {
                                $sem_label_dernier = $donnees;
                            }
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }



                        //Si dernier sem_label != prochain label pour un id_cursus on mporte le suviant
                        if ($sem_label_dernier != $monfichier[$c + 2]) {

                            $req = $bdd->prepare('INSERT INTO semestre(sem_label, id_cursus) VALUES(:sem_label, :id_cursus)');
                            $req->execute(array(
                                //'sem_seq' => $monfichier[$c + 1],
                                'sem_label' => $monfichier[$c + 2],
                                'id_cursus' => $cursus_id
                                    //'label_cursus' => 2
                            ));
                            //$i = $i+1;
                        }
                    }


                    try {
                        $reponse = $bdd->query('SELECT sem_id FROM semestre WHERE id_cursus="' . $cursus_id . '" AND sem_label="'.$monfichier[$c + 2].'" ');

                        while ($donnees = $reponse->fetchcolumn()) {
                            $sem_id_dernier = $donnees;
                            
                            $req = $bdd->prepare('INSERT INTO semestre_element_formation(sem_id, sigle, resultat, credit, profil, sem_seq) VALUES(:sem_id, :sigle, :resultat, :credit, :profil, :sem_seq)');
                            $req->execute(array(
                                'sigle' => $monfichier[$c + 3],
                                'resultat' => $monfichier[$c + 9],
                                'credit' => $monfichier[$c + 8],
                                'profil' => $monfichier[$c + 7],
                                'sem_seq' => $monfichier[$c + 1],
                                'sem_id' => $sem_id_dernier
                            ));
                        }
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }


                    //Fonctionne
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
            //alert('Tours de boucle');
        </script>
        <?php

//fclose($file);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $i++;
}
?>
<script>
    //alert('Le fichier a été bien importé');
</script>

<?php

//header("Location: $_SERVER[HTTP_REFERER]");
//exit();
//_SESSION['nom'] = $nom . $prenom ;
?>
<html>
<head>
<title>Redirection en HTML</title>
 
<meta http-equiv="refresh" content="0; URL=http://localhost/Projet_Idee/PagesWeb/page_etudiant.php">
</head>
 
<body>
</body>
 
</html>
