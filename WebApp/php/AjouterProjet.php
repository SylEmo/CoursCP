<?php

if(!isset($_SESSION)) {
    session_start();
}
require_once("Connexion.php");

$id=$_SESSION['Niv'];
$nom=$_POST['NOM'];
$dc=$_POST['DATECREATION'];
$dl=$_POST['DEADLINE'];
$gitutil=$_POST['GITUTIL'];
$gitdepot=$_POST['GITDEPOT'];

$req="insert into PROJET (IDUTIL, NOM, DATE_CREATION, DEADLINE, LIEN_GIT) VALUE ('$id','$nom','$dc','$df','$git')";
mysql_query($req) or die(mysql_error());

?>

<!DocTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
<form>
<b> Votre projet a bien ete ajoute </b>
<table border="1">

    <tr>
        <td> Nom du projet: </td>
        <td><?php echo ($nom) ?></td>
    </tr>
    <tr>
        <td>Date de Cr&eacute;ation :</td>
        <td><?php echo ($dc) ?></td>
    </tr>
    <tr>
        <td>Date de Fin : </td>
        <td><?php echo ($dl) ?>" </td>
    </tr>
    <tr>
        <td>Nom de l'utilisateur &agrave; qui appartient le d&eacute;p&ocirc;t : </td>
        <td><?php echo ($gitutil) </td>
    </tr>
    <tr>
        <td>Nom du d&eacute;p&ocirc;t : </td>
        <td><?php echo ($gitdepot) </td>
    </tr>
</table>
<a href="../liste-projets.html">Aller Vers la Page D'affichage </a>
</form>
</body>
</html>
