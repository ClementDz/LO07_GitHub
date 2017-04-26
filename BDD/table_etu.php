<!-- Contient tous les etudiants -->
<html>
<?php
include("Connexion_BDD.php");
 
connexion();
 
$sql= "CREATE TABLE IF NOT EXISTS `mabase` (";
$sql .= "`id` int(11) NOT NULL auto_increment,";
$sql .= "`nom` text NOT NULL,";
$sql .= "`prenom` text NOT NULL,";
$sql .= "`age` int NOT NULL,";
$sql .= "PRIMARY KEY  (`id`),";
$sql .= "UNIQUE KEY `id_2` (`id`),";
$sql .= "KEY `id` (`id`)";
$sql .= ") ENGINE=MyISAM;";
 
mysql_query($sql) or die(mysql_error());
?>

<form name="formulaire" method="post" action="ajouter.php">
<table width="200" border="1">
    <tr>
        <td>Nom:</td>
        <td><input name="nom" type="text" id="nom" /></td>
    </tr>
    <tr>
        <td>Prénom:</td>
        <td><input name="prenom" type="text" id="prenom" /></td>
    </tr>
    <tr>
        <td>Age:</td>
        <td><input name="age" type="text" id="age" size="3" maxlength="3" /></td>
    </tr>
    <tr>
        <td colspan="2">
            <div align="center">
            <input type="submit" name="Submit" value="Envoyer" />
            </div>
        </td>
    </tr>
</table>
</form>
</html>