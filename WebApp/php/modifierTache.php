<?php


require_once("verifier1.php");
require_once("connexion.php");

$idt=$_POST['id_tache'];
$ids=$_POST['id_sprint'];
$desc=$_POST['desc_t'];

$req="update tache set DESCRTION='$desc' where ID='$idt',IDSPRINT='$ids'";
mysql_query($req) or die(mysql_error());

header("location:.php");//redirection vers la page des taches

?>