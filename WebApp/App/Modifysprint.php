<?php


require_once("verifier1.php");
require_once("connexion.php");

$id=$_POST['id'];
$nb=$_POST['nb'];



$req="update sprint set NUMERO='$nB' where id=$id";
mysql_query($req) or die(mysql_error());

header("location:.php");//redirection vers la page des sprints

?>