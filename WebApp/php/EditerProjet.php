<?php

require_once("Verifier1.php");
require_once("Connexion.php");
$id=$_GET['id'];
$req="select * from PROJET WHERE ID=$id";
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
<form method="POST" action="ModifierProjet.php">
	<center>
	<table border="1" width="50%">

	<input type="hidden" name="ID" value="<?php echo ($pr['ID']) ?>">

		<tr>
			<td> Nom du projet : </td>
			<td><input type="text"  name="NOM" value="<?php echo ($pr['NOM']) ?>"> </td>
		</tr>
		<tr>
			<td> Date de creation : </td>
			<td><input type="text" name="DATECREATION" value="<?php echo ($pr['DATE_CREATION']) ?>" readonly="true"> </td>
		</tr>
		<tr>
			<td> Date de fin </td>
			<td><input type="text" name="DEADLINE" value="<?php echo ($pr['DEADLINE']) ?>">  </td>
		</tr>
		<tr>
			<td> Lien du GITHUB </td>
			<td><input type="text" name="LIENGIT" value="<?php echo ($pr['LIEN_GIT']) ?>">  </td>
		</tr>


	</table>
		<button  type="submit"  class="btn btn-primary">Enregistrer</button>
	</center>
</body>
</form>
</html>