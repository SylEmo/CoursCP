<?php
$values = $_POST['values'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$res="";
$req="";
$nbus=sizeof($values);
for($i=0;$i<$nbus;$i++){
	if(!empty($values[$i]["Numero"])){
		$req= "UPDATE USERSTORY SET IDENTIFIANT=\"".$values[$i]["Identifiant"]."\", DESCRIPTION=\"".$values[$i]["Userstory"]."\", PRIORITE=".$values[$i]["Priorite"].", DIFFICULTE=".$values[$i]["Difficulte"]." WHERE ID=".$values[$i]["Numero"];
		mysql_query($req) or die(mysql_error());
	}else{
		//$req= "INSERT";
		//mysql_query($req) or die(mysql_error());
	}
}
?>