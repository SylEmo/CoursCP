<?php
$bla = $_POST['bla'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
session_start();
require_once("Connexion.php");
$req= "select * from PROJET WHERE IDUTIL=".$_SESSION['Niv'];
$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	$result.= $pr['ID'] .'-'.$pr['NOM'].'-';
}

//on efface le dernier "-" pour aider le split dans le fichier liste-projets.html et ainsi empecher d'avoir une entrée vie dans le tableau et donc une ligne de projet vide
$result = substr($result, 0, -1);

echo $result;
?>