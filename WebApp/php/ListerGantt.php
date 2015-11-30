<?php


require_once("Verifier1.php");
if(!isset($_SESSION)) {
    session_start();
}
require_once("Connexion.php");


$idsprint=$_POST['idSprint'];
$idprojet=$_POST['idProjet'];

$req = "SELECT * FROM GANTT WHERE IDSPRINT=(SELECT ID FROM SPRINT WHERE ID=".$idsprint." AND IDPROJET=".$idprojet.")";
$rs = mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {

    $result.= $pr['ID'] .'\|/'.$pr['NOM'].'\|/'.$pr['LUNDI_M'].'\|/'.$pr['LUNDI_AP'].'\|/'.$pr['MARDI_M'].'\|/'.$pr['MARDI_AP'].'\|/'.$pr['MERCREDI_M'].'\|/'.$pr['MERCREDI_AP'].'\|/'.$pr['JEUDI_M'].'\|/'.$pr['JEUDI_AP'].'\|/'.$pr['VENDREDI_M'].'\|/'.$pr['VENDREDI_AP'].'\|/';
}

$result = substr($result, 0, -3);
echo utf8_encode($result);

?>

