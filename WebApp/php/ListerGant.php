<?php


require_once("Connexion.php");
require_once("Verifier1.php");


$req= "select * from GANTT";
$rs=mysql_query($req) or die(mysql_error());
//il faut un passage en param�tre normalement
header("location:../gantt.html");


?>

