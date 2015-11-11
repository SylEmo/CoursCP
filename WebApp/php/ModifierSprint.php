<?php


require_once("Verifier1.php");
require_once("Connexion.php");

$id=$_POST['id'];
$nb=$_POST['nb'];



$req="update sprint set NUMERO='$nB' where id=$id";
mysql_query($req) or die(mysql_error());

header("location:../liste-sprints.html");//redirection vers la page des sprints

?>