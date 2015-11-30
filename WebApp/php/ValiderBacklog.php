<?php
$values = $_POST['values'];
$idprojet = $_POST['idprojet'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$res="";
$req="";
$nbus=sizeof($values);
$result="";
for($i=0;$i<$nbus;$i++){
	if(is_numeric($values[$i]["Numero"])){
		$req= "UPDATE USERSTORY SET IDENTIFIANT=\"".$values[$i]["Identifiant"]."\", DESCRIPTION=\"".$values[$i]["Userstory"]."\", PRIORITE=".$values[$i]["Priorite"].", DIFFICULTE=".$values[$i]["Difficulte"]." WHERE ID=".$values[$i]["Numero"];
		mysql_query($req) or die(mysql_error());
	}else{
		$req= "INSERT INTO USERSTORY (IDPROJET,DESCRIPTION, DIFFICULTE, PRIORITE, IDENTIFIANT) VALUE (".$idprojet.",\"".$values[$i]["Userstory"]."\",".$values[$i]["Difficulte"].",".$values[$i]["Priorite"].",\"".$values[$i]["Identifiant"]."\")";
		mysql_query($req) or die(mysql_error());
	}
}
echo $result;
?>