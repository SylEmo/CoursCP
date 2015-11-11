<?php

require_once("connexion.php");

$us=$_POST['us'];
$prio=$_POST['prio'];
$diff=$_POST['diff'];

$req="insert into userstory (DESCRIPTION,PRIORITE,DIFFICULTE) VALUE ('$us','$prio','$diff')";
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
            <td> user story : </td>
            <td><?php echo ($us) ?></td>
        </tr>
        <tr>
            <td> priorite : </td>
            <td><?php echo ($prio) ?></td>
        </tr>
        <tr>
            <td> difficulte : </td>
            <td><?php echo ($diff) ?>" </td>
        </tr>
    </table>
</form>
</body>
</html>
