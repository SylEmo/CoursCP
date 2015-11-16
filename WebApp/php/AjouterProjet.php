<?php

session_start();
require_once("Connexion.php");

$id=$_SESSION['Niv'];
$nom=$_POST['NOM'];
$dc=$_POST['DATECREATION'];
$dl=$_POST['DEADLINE'];
$git=$_POST['LIENGIT'];

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
        <td> date de debut: </td>
        <td><?php echo ($dc) ?></td>
    </tr>
    <tr>
        <td> date de fin: </td>
        <td><?php echo ($dl) ?>" </td>
    </tr>
	<tr>
        <td> lien du git: </td>
        <td><?php echo ($git) ?>" </td>
    </tr>
</table>
<a href="../liste-projets.html">Aller Vers la Page D'affichage </a>
</form>
</body>
</html>
