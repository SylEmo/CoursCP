<?php
$idSprint = $_POST['idsprint'];


require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");

$req= "SELECT * FROM TACHE WHERE IDSPRINT =(SELECT ID FROM SPRINT WHERE ID=".$idSprint." AND IDPROJET IN(SELECT ID FROM PROJET WHERE IDUTIL=".$_SESSION['Niv']."))";

$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	$result.=$pr['DESCRIPTION'].'\|/'.$pr['IDENTIFIANT'].'\|/'.$pr['ETAT'].'\|/';
}
echo utf8_encode($result);
?>