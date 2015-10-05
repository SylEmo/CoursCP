<%@ page contentType="text/html" pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Index</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<style type="text/css">
#d {
	margin-left: 2em;
	margin-top: 2em;
}

#i {
	position: absolute;
	top: 20px;
	left: 0;
	width: 130px;
	height: 140px;
}

table#t01 {
	width: 60%;
	background-color: #f1f1c1;
	border-style: solid;
	border-collapse: collapse;
}

table#t02 {
	width: 60%;
}

input[type="checkbox"] {
	transform: scale(1.3, 1.3);
}

body {
	background-color: #b0c4de;
}

.right {
	text-align: right;
	float: right;
}
</style>
</head>

<body>
	<div id="d">
		<h1 align="center">Centre National de Recherche Scientifique</h1>
		<br>
		<br>
		<h3 align="center">Listing de vos ateliers</h3>
		<br>
		<p id="i">
			<img src="img/cnrs.gif" alt="cnrs">
		</p>


		<table align="center" id="t02">
			<tr>
				<td align="left"><button class="btn btn-primary"
						onclick="ajouter()">
						<b>Ajouter Atelier</b>
					</button></td>
				<td></td>
				<td align="right"><button class="btn btn-primary"
						onclick="supprimer()">
						<b>Supprimer Atelier</b>
					</button></td>
			</tr>
		</table>
		<br>

		<table align="center" id="t01">
			<tr>
				<td><b><a href="/detail-atelier">Atelier 1</a></b></td>
				<td><a class="right" align="right" href="/modifier-atelier"><img
						src="img/mod.png" alt="modify"
						style="width: 25px; height: 25px; border: 0"></a></td>
				<td align="right"><input type="checkbox" name="choix1"
					value="ch1"></td>
			</tr>

			<tr class="blank_row">
				<td bgcolor="#FFFFFF" colspan="3">&nbsp;</td>
			</tr>

			<c:forEach var="atelier" items="${listeAteliers}">
				<tr>
					<td><b><a href="/detail-atelier">Atelier</a></b></td>
					<td><a class="right" align="right" href="ModifierAtelier.jsp"><img
							src="/img/mod.png" alt="modify"
							style="width: 25px; height: 25px; border: 0"></a></td>
					<td align="right"><input type="checkbox" name="choix"
						value="choix"></td>
				</tr>

			</c:forEach>
		</table>
	</div>


	<script type="text/javascript">
	    function ajouter(){
	    	document.location.href = "/ajout-atelier";
	    }
	
	  	function supprimer(){
	    	$.post("/supprimer-atelier", function(){});
	    }
	</script>
</body>
</html>