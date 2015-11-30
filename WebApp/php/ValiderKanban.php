<?php
$taches = $_POST['listeTaches'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$res="";
$req="";
$result="";

$nbus=sizeof($taches);
for($i=0;$i<$nbus;$i++){
	//$result.="--".$taches[$i]['id']."--".$taches[$i]['Identifiant']."--".$taches[$i]["Description"]."--".$taches[$i]["Etat"]."--";
	if(!empty($taches[$i]["id"])){
		$req= "UPDATE TACHE SET IDENTIFIANT=\"".$taches[$i]["Identifiant"]."\", DESCRIPTION=\"".utf8_encode($taches[$i]["Description"])."\", ETAT=".$taches[$i]["Etat"]." WHERE ID=".$taches[$i]["id"];
		mysql_query($req) or die(mysql_error());
	}
}
?>