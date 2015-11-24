<?php
$bla = $_POST['bla'];
//echo "testderetourphp".$bla;

require_once("Verifier1.php");
session_start();
require_once("Connexion.php");
$req= "select * from PROJET WHERE IDUTIL=".$_SESSION['Niv'];
$rs=mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {
	$result.="<li><h3 class=\"name\"><a onclick=\"ouvrirProjet(".$pr['ID'].");\">".$pr['NOM']."</a></h3></li>";
}
echo $result;
?>