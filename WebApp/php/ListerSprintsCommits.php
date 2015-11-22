<?php
$idprojet = $_POST['id'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
session_start();
require_once("Connexion.php");
$req= "SELECT * FROM TACHE WHERE IDSPRINT IN (SELECT ID FROM SPRINT WHERE IDPROJET=(SELECT ID FROM PROJET WHERE ID=".$idprojet." AND IDUTIL=".$_SESSION['Niv']."))";
$rs=mysql_query($req) or die(mysql_error());

$result="<select>";
$sprint="";
while($pr=mysql_fetch_assoc($rs)) {
	if(empty($sprint)){
		$sprint = $pr['IDSPRINT'];
		$result.= "<optgroup label=\"Sprint ".$pr['IDSPRINT']."\">";
	}
	if($pr['IDSPRINT'] == $sprint){
		$result.="<option id=\"".$pr['ID']."\"> Tache ".$pr['IDENTIFIANT']."</option>";
	}else{
		$sprint = $pr['IDSPRINT'];
		$result.="</optgroup><optgroup label=\"Sprint ".$pr['IDSPRINT']."\"><option id=\"".$pr['ID']."\"> Tache ".$pr['IDENTIFIANT']."</option>";
	}
}

$result.="</optgroup></select>";

echo $result;
?>