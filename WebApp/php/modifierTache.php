<?php


require_once("Verifier1.php");
require_once("Connexion.php");

$idt=$_POST['id_tache'];
$ids=$_POST['id_sprint'];
$desc=$_POST['desc_t'];

$req="update tache set DESCRTION='$desc' where ID='$idt',IDSPRINT='$ids'";
mysql_query($req) or die(mysql_error());

header("location:../liste-taches.html");//redirection vers la page des taches

?>