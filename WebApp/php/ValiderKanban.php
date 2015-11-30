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
	$result.="--".$taches[$i]['Identifiant']."--".$taches[$i]["Description"]."--".$taches[$i]["Etat"]."--";
	/*if(!empty($values[$i]["Numero"])){
		$req= "UPDATE USERSTORY SET IDENTIFIANT=\"".$values[$i]["Identifiant"]."\", DESCRIPTION=\"".$values[$i]["Userstory"]."\", PRIORITE=".$values[$i]["Priorite"].", DIFFICULTE=".$values[$i]["Difficulte"]." WHERE ID=".$values[$i]["Numero"];
		mysql_query($req) or die(mysql_error());
	}else{
		//$req= "INSERT";
		//mysql_query($req) or die(mysql_error());
	}*/
}
echo $result;
?>