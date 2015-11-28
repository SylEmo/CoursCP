<?php
$idprojet = $_POST['id'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
$req= "select * from USERSTORY WHERE IDPROJET=(select ID from PROJET where ID=".$idprojet." and IDUTIL=".$_SESSION['Niv'].")";
$rs=mysql_query($req) or die(mysql_error());
$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	$result.="<tr id=\"3\" style=\"min-height: 28px;\"><td class=\"number\">".$pr['ID']."</td><td>".$pr['IDENTIFIANT']."</td><td>".$pr['DESCRIPTION']."</td><td class=\"number\">".$pr['PRIORITE']."</td><td class=\"number\">".$pr['DIFFICULTE']."</td><td><a onclick=\"editableGrid.removeRow(".$pr['ID'].");\">Supprimer</a></td></tr>";
}
echo $result;
?>