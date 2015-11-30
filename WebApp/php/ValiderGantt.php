<?php
$values=$_POST['values'];
$idsprint=$_POST['idSprint'];
$idprojet=$_POST['idProjet'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$res="";
$req="";
$result="";
$nbus=sizeof($values);
for($i=0;$i<$nbus;$i++){
	if(is_numeric($values[$i]["Numero"])){
		//$result.="UPDATE GANTT SET NOM=\"".$values[$i]["Developpeur"]."\", LUNDI_M=".$values[$i]["Lundi-matin"].", LUNDI_AP=".$values[$i]["Lundi-apresmidi"].", MARDI_M=".$values[$i]["Mardi-matin"].", MARDI_AP=".$values[$i]["Mardi-apresmidi"].", MERCREDI_M=".$values[$i]["Mercredi-matin"].", MERCREDI_AP=".$values[$i]["Mercredi-apresmidi"].", JEUDI_M=".$values[$i]["Jeudi-matin"].", JEUDI_AP=".$values[$i]["Jeudi-apresmidi"].", VENDREDI_M=".$values[$i]["Vendredi-matin"].", VENDREDI_AP=".$values[$i]["Vendredi-apresmidi"]." WHERE ID=".$values[$i]["Numero"];
		$req= "UPDATE GANTT SET NOM=\"".$values[$i]["Developpeur"]."\", LUNDI_M=".$values[$i]["Lundi-matin"].", LUNDI_AP=".$values[$i]["Lundi-apresmidi"].", MARDI_M=".$values[$i]["Mardi-matin"].", MARDI_AP=".$values[$i]["Mardi-apresmidi"].", MERCREDI_M=".$values[$i]["Mercredi-matin"].", MERCREDI_AP=".$values[$i]["Mercredi-apresmidi"].", JEUDI_M=".$values[$i]["Jeudi-matin"].", JEUDI_AP=".$values[$i]["Jeudi-apresmidi"].", VENDREDI_M=".$values[$i]["Vendredi-matin"].", VENDREDI_AP=".$values[$i]["Vendredi-apresmidi"]." WHERE ID=".$values[$i]["Numero"];
		mysql_query($req) or die(mysql_error());
	}else{
		//$result.="INSERT INTO GANTT (IDSPRINT, NOM, LUNDI_M, LUNDI_AP, MARDI_M, MARDI_AP, MERCREDI_M, MERCREDI_AP, JEUDI_M, JEUDI_AP, VENDREDI_M, VENDREDI_AP) VALUES (".$idsprint.",\"".$values[$i]["Developpeur"]."\",".$values[$i]["Lundi-matin"].",".$values[$i]["Lundi-apresmidi"].", ".$values[$i]["Mardi-matin"].", ".$values[$i]["Mardi-apresmidi"].", ".$values[$i]["Mercredi-matin"].", ".$values[$i]["Mercredi-apresmidi"].", ".$values[$i]["Jeudi-matin"].", ".$values[$i]["Jeudi-apresmidi"].", ".$values[$i]["Vendredi-matin"].", ".$values[$i]["Vendredi-apresmidi"].")";
		$req= "INSERT INTO GANTT (IDSPRINT, NOM, LUNDI_M, LUNDI_AP, MARDI_M, MARDI_AP, MERCREDI_M, MERCREDI_AP, JEUDI_M, JEUDI_AP, VENDREDI_M, VENDREDI_AP) VALUES (".$idsprint.",\"".$values[$i]["Developpeur"]."\",".$values[$i]["Lundi-matin"].",".$values[$i]["Lundi-apresmidi"].", ".$values[$i]["Mardi-matin"].", ".$values[$i]["Mardi-apresmidi"].", ".$values[$i]["Mercredi-matin"].", ".$values[$i]["Mercredi-apresmidi"].", ".$values[$i]["Jeudi-matin"].", ".$values[$i]["Jeudi-apresmidi"].", ".$values[$i]["Vendredi-matin"].", ".$values[$i]["Vendredi-apresmidi"].")";
		mysql_query($req) or die(mysql_error());
		
	}
}
?>