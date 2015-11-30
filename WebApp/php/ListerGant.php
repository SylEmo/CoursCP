<?php


require_once("Verifier1.php");
if(!isset($_SESSION)) {
    session_start();
}
require_once("Connexion.php");


$id_sprint=$_GET['id_sprint'];
$id_projet=$_GET['id_projet'];

$req= "select * from GANTT WHERE ID=".$id_projet." AND IDSPRINT=".$id_sprint."";

mysql_query($req) or die(mysql_error());

$result='';
while($pr=mysql_fetch_assoc($rs)) {

    $result.= $pr['IDSPRINT'] .'\|/'.$pr['NOM'].'\|/'.$pr['LUNDI_M'].'\|/'.$pr['LUNDI_AP'].'\|/'.$pr['MARDI_M'].'\|/'.$pr['MERCREDI_M'].'\|/'.$pr['MERCREDI_AP'].'\|/'.$pr['JEUDI_M'].'\|/'.$pr['JEUDI_AP'].'\|/'.$pr['VENDREDI_M'].'\|/'.$pr['VENDREDI_AP'].'\|/';
}

$result = substr($result,0);
echo utf8_encode($result);



?>

