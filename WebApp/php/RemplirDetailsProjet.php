<?php
$idprojet = $_POST['id'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$req= "SELECT NOM, DATE_CREATION, DEADLINE, GITUTIL, GITDEPOT FROM PROJET WHERE IDUTIL=".$_SESSION['Niv']." AND ID=".$idprojet;
$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	//$result.="<li><h3 class=\"name\"><a onclick=\"ouvrirProjet(".$pr['ID'].");\">".$pr['NOM']."</a></h3><a onclick=\"modifierProjet(".$pr['ID'].");\">Modifier</a> <a onclick=\"supprimerProjet(".$pr['ID'].");\">Supprimer</a></li>";
	$result.= $pr['NOM'] .'\|/'.$pr['DATE_CREATION'] .'\|/'.$pr['DEADLINE'].'\|/'.$pr['GITUTIL'].'\|/'.$pr['GITDEPOT'].'\|/';
}
//on efface le dernier "-" pour aider le split dans le fichier liste-projets.html et ainsi empecher d'avoir une entrée vie dans le tableau et donc une ligne de projet vide
$result = substr($result, 0, -3);
echo utf8_encode($result);
?>