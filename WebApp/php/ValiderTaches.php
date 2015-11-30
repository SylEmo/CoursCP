<?php
$values = $_POST['values'];
$idsprint = $_POST['idSprint'];

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
		//$result.="UPDATE TACHE SET IDENTIFIANT=\"".$values[$i]["Identifiant"]."\", DESCRIPTION=\"".$values[$i]["Description"]."\", COUT=".$values[$i]["Cout"]." WHERE ID=".$values[$i]["Numero"];
		$req= "UPDATE TACHE SET IDENTIFIANT=\"".$values[$i]["Identifiant"]."\", DESCRIPTION=\"".$values[$i]["Description"]."\", COUT=".$values[$i]["Cout"]." WHERE ID=".$values[$i]["Numero"];
		mysql_query($req) or die(mysql_error());
	}else{
		//$result.="INSERT INTO TACHE (IDSPRINT, IDENTIFIANT, DESCRIPTION, COUT, ETAT) VALUES (".$idsprint.", \"".$values[$i]["Identifiant"]."\", \"".$values[$i]["Description"]."\", ".$values[$i]["Cout"].", 0)";
		$req= "INSERT INTO TACHE (IDSPRINT, IDENTIFIANT, DESCRIPTION, COUT, ETAT) VALUES (".$idsprint.", \"".$values[$i]["Identifiant"]."\", \"".$values[$i]["Description"]."\", ".$values[$i]["Cout"].", 0)";
		mysql_query($req) or die(mysql_error());
	}
}
//echo json_encode($values);
//echo $result;
?>