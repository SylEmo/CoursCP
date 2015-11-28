<?php

require_once("Connexion.php");
require_once("Verifier1.php");

$id_sprint=$_GET['id_sprint'];
$nom=$_GET['nom'];
$l_m=$_GET['lm'];
$l_ap=$_GET['l_ap'];
$ma_m=$_GET['ma_m'];
$ma_ap=$_GET['ma_ap'];
$me_m=$_GET['me_m'];
$me_ap=$_GET['me_ap'];
$j_m=$_GET['j_m'];
$j_ap=$_GET['j_ap'];
$v_m=$_GET['v_m'];
$v_ap=$_GET['v_ap'];

$req = "insert into GANTT (NOM,LUNDI_M,LUNDI_AP,MARDI_M,MARDI_AP,MERCREDI_M,MERCREDI_AP,JEUDI_M,JEUDI_AP,VENDREDI_M,VENDREDI_AP) VALUE ($id_sprint,'$nom','$l_m','$l_ap','$ma_m','$ma_ap','$me_m','$me_ap','$j_m','$j_ap','$v_m','$v_ap')";
mysql_query($req) or die(mysql_error());
header("location:../gantt.html");


?>
