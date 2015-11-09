<?php

require_once("connexion.php");

$nb=$_POST['nb'];//number of sprint


$req="insert into sprint (NUMERO) VALUE ('$nb')";
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
    <b> Votre sprint a ete bien ajoute </b>
    <table border="1">

        <tr>
            <td> N° de sprint : </td>
            <td><?php echo ($nb) ?></td>
        </tr>

    </table>
</form>
</body>
</html>
