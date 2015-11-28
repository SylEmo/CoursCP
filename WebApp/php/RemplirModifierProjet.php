<?php
$idprojet = $_POST['id'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$req= "select NOM, DEADLINE, LIEN_GIT from PROJET WHERE IDUTIL=".$_SESSION['Niv']." AND ID =".$idprojet;
$rs=mysql_query($req) or die(mysql_error());

$result="";
while($pr=mysql_fetch_assoc($rs)) {
	$result.= $pr['NOM'] ."&".$pr['DEADLINE']."&".$pr['GITUTIL']."&".$pr['GITDEPOT']."&";
}

//on efface le dernier "-" pour aider le split dans le fichier liste-projets.html et ainsi empecher d'avoir une entrée vie dans le tableau et donc une ligne de projet vide
$result = substr($result, 0, -1);

echo $result;
?>