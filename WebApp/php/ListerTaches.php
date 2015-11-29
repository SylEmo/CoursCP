<?php
$idprojet = $_POST['idProjet'];
$idsprint = $_POST['idSprint'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$req= "SELECT * FROM TACHE WHERE IDSPRINT=(SELECT ID FROM SPRINT WHERE ID=".$idsprint." AND IDPROJET=(SELECT ID FROM PROJET WHERE ID=".$idprojet." AND IDUTIL=".$_SESSION['Niv']."))";
$rs=mysql_query($req) or die(mysql_error());
$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	// $result.="<tr id=\"3\" style=\"min-height: 28px;\"><td class=\"number\">".$pr['ID']."</td><td>".$pr['IDENTIFIANT']."</td><td>".$pr['DESCRIPTION']."</td><td class=\"number\">".$pr['COUT']."</td><td><a onclick=\"editableGrid.removeRow(".$pr['ID'].");\">Supprimer</a></td></tr>";
	$result.= $pr['ID'] .'\|/'. $pr['IDENTIFIANT'] .'\|/'. $pr['DESCRIPTION'] .'\|/'. $pr['COUT'] .'\|/';
}
echo utf8_encode($result);
?>