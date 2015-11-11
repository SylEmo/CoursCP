<?php

require_once("connexion.php");

$desc=$_POST['desc'];




$req="insert into tache (DESCRIPTION) VALUE ('$desc')";
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
    <b> Votre tache a ete bien ajoute </b>
    <table border="1">

        <tr>
            <td> description de la tache : </td>
            <td><?php echo ($desc) ?></td>
        </tr>

    </table>
</form>
</body>
</html>
