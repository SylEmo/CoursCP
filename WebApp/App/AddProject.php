<?php

require_once("connexion.php");

$np=$_POST['np'];
$dc=$_POST['dc'];
$df=$_POST['df'];

$req="insert into projets (nom,dated,datef) VALUE ('$np','$dc','$df')";
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
<b> Votre projet a ete bien ajoute </b>
<table border="1">

    <tr>
        <td> Nom du projet: </td>
        <td><?php echo ($np) ?></td>
    </tr>
    <tr>
        <td> date de debut: </td>
        <td><?php echo ($dc) ?></td>
    </tr>
    <tr>
        <td> date de fin: </td>
        <td><?php echo ($df) ?>" </td>
    </tr>
</table>
<a href="ListProjects.php">Aller Vers la Page D'affichage </a>
</form>
</body>
</html>
