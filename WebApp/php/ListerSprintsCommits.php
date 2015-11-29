<?php
$idprojet = $_POST['id'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$req= "SELECT TACHE.ID, IDSPRINT, IDENTIFIANT, NUMERO FROM TACHE, SPRINT WHERE IDSPRINT IN (SELECT ID FROM SPRINT WHERE IDPROJET=(SELECT ID FROM PROJET WHERE ID=".$idprojet." AND IDUTIL=".$_SESSION['Niv'].")) AND IDSPRINT=SPRINT.ID";
$rs=mysql_query($req) or die(mysql_error());

$result="";//<select>";
$sprint="";
while($pr=mysql_fetch_assoc($rs)) {
	if(empty($sprint)){
		$sprint = $pr['IDSPRINT'];
		$result.= "<optgroup label=\"Sprint ".$pr['NUMERO']."\">";
	}
	if($pr['IDSPRINT'] == $sprint){
		$result.="<option id=\"S".$pr['NUMERO']."-".$pr['IDENTIFIANT']."\"> Tache ".$pr['IDENTIFIANT']."</option>";
	}else{
		$sprint = $pr['IDSPRINT'];
		$result.="</optgroup><optgroup label=\"Sprint ".$pr['NUMERO']."\"><option id=\"S".$pr['NUMERO']."-".$pr['IDENTIFIANT']."\"> Tache ".$pr['IDENTIFIANT']."</option>";
	}
}

$result.="</optgroup>";//</select>";

echo utf8_encode($result);
?>