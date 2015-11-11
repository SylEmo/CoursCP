<?php

require_once("verifier1.php");
require_once("connexion.php");
$id=$_GET['id'];
$req="select * from userstory WHERE id=$id";
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
<form method="POST" action="modifyBacklog.php">
    <center>
        <table border="1" width="50%">

            <tr>
                <td> Id : </td>
                <td><input type="text"  name="id" value="<?php echo ($pr['id']) ?>" readonly="true" </td>
            </tr>
            <tr>
                <td> Description de la user story : </td>
                <td><input type="text"  name="nom" value="<?php echo ($pr['us']) ?>"</td>
            </tr>
            <tr>
                <td> Priorité :  </td>
                <td><input type="text" name="dated" value="<?php echo ($pr['prio']) ?>" readonly="true"</td>
            </tr>
            <tr>
                <td> Difficulté : </td>
                <td><input type="text" name="datef" value="<?php echo ($pr['diff']) ?>"  </td>
            </tr>


        </table>
        <button  type="submit"  class="btn btn-primary">Enregistrer</button>
    </center>
</body>
</form>
</html>