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


    $req="UPDATE GANTT set NOM='$nom',LUNDI_M=$l_m,LUNDI_AP='$l_ap',MARDI_M='$ma_m',MARDI_AP='$ma_ap',MERCREDI_M='$me_m',MERCREDI_AP='$me_ap',JEUDI_M='$j_m',JEUDI_AP='$j_ap',VENDREDI_M='$v_m',VENDREDI_AP='$v_ap' where IDPRINT=$id_sprint";
    mysql_query($req) or die(mysql_error());

     header("location:../gantt.html");

?>