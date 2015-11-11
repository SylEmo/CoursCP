<?php

require_once("verifier1.php");
require_once("connexion.php");
$idt=$_GET['idt'];
$ids=$_GET['ids'];

$req="select * from tache WHERE ID=$idt,IDSPRINT=$ids";
$rs=mysql_query($req) or die (mysql_error());

$pr=mysql_fetch_assoc($rs);
?>

<!DocTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style type="text/css">
        body{
            background-color: #f1f1c1;
            margin-left: 2em;
            margin-top: 2em;
        }

    </style>


</head>

<body>
<form method="POST" action="modifierTache.php">
    <center>
        <table border="1" width="50%">
            <tr>
                <td> Id : </td>
                <td><input type="text"  name="id_tache" value="<?php echo ($pr['idt']) ?>" readonly="true" </td>
            </tr>
            <tr>
                <td> Id Sprint : </td>
                <td><input type="text"  name="id_sprint" value="<?php echo ($pr['ids']) ?>" readonly="true" </td>
            </tr>
            <tr>
                <td> Description de la tache : </td>
                <td><input type="text"  name="desc_t" value="<?php echo ($pr['desc']) ?>"</td>
            </tr>

        </table>
        <button  type="submit"  class="btn btn-primary">Enregistrer</button>
    </center>
</body>
</form>
</html>