<!-- Login pour avoir accès à la BDD -->

<?php
$host = "localhost"; /* L'adresse du serveur */
$login = "root"; /* Votre nom d'utilisateur */
$password = ""; /* Votre mot de passe */
$base = "bdd"; /* Le nom de la base */

function connexion() {
    global $host, $login, $password, $base;
    try {
        $bdd = new PDO('mysql:host=$host;dbname=$base;charset=utf8', '$login', '$password');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    //$db = mysql_connect($host, $login, $password);
    //mysql_select_db($base, $db);
}
?>
