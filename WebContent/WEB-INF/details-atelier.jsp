<%@page import="java.sql.ResultSet"%>
<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
pageEncoding="ISO-8859-1"%>

<html>
  <head>
      <title>Details de L'Atelier</title>
      <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/bootstrap.js"></script>
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

     <style type="text/css">
      
       #i{
        position:absolute;
        top: 20px;
        left: 0;
        width : 130px;
        height : 140px;
      }
      #j{
        position:absolute;
        top: 20px;
        right: 0;
        width : 130px;
        height : 140px;
      }

      #t1{
          width: 60%;
          height: 40%;
          margin-left:300px;
          background-color: #D0D9DE;
        
      }
     

      #t2{
          width: 60%;
          height: 10%;
          margin-left:340px;
      }
      #t3{
          width: 60%;
          height: 40%;
          margin-left:300px;
          background-color: #D0D9DE;
      }
      
     body {
           background-color: #b0c4de;
          }
     </style>
</head>
    <body>
          <div id="d">
          <h3 align="center">Details de l'Atelier </h3><br><br><br><br>
          <p id="i"><img src="img/cnrs.gif" alt="cnrs"></p>
          <p id="j"><img src="img/fete.jpg" alt="fete"></p>

    
        <form name="form" action="/detail-atelier">
          <table   align="center" id="t1">
            <tr>
              <td><b>Titre :  </b></td><td><input type="text" name="titre" value="titre ..." /><td>
            </tr>
            <tr>
              <td><b>Theme :  </b></td><td><input type="text" name="theme" value="theme ..." /><td>
            </tr>
            <tr>
              <td><b>Type : </b></td><td><input type="text" name="type" value="type ..." /><td>
            </tr>
            <tr>
              <td><b>Duree de l'atelier :</b></td><td><input type="text" name="duree"  value="duree ..." /><td>
            </tr>
             
            <tr>
              <td><b> Capacite :</b></td><td><input type="text" name="capacite" value="capacite ..." /><td>
            </tr>
            </table>
           <table align="center" id="t3">
            <tr>
              <th rowspan="10" align="left"><b>  Date et Horaires </b></th>
		<td>Lundi Matin :</td><td>Non</td>
            </tr>
	    <tr>
                 <td>Lundi Apres-Midi :</td><td>Non</td>
            </tr>
            <tr>
                 <td>Mardi Matin :</td><td>oui</td>
            </tr>
             <tr>
                 <td>Mardi Apres-Midi :</td><td>oui</td>
            </tr>
	          <tr>
                 <td>Mercredi Matin :</td><td>Non</td>
            </tr>
            <tr>
                 <td>Merceredi Apres-Midi :</td><td>Non</td>
            </tr>
           <tr>
                 <td>Jeudi Matin :</td><td>oui</td>
            </tr>
            <tr>
                 <td>Jeudi Apres-Midi :</td><td>oui</td>
            </tr>
            <tr>
                 <td>Vendredi Matin :</td><td>Non</td>
            </tr>
            <tr>
                 <td>Vendredi Apres-Midi :</td><td>Non</td>
            </tr>
           
            </table>
            <table align="center" id="t2">
             <tr>
               <td align="right"><button  class="btn btn-primary" type=""><b>Retour</b></button></td>
               <td></td> 
               <td align="left"><button  class="btn btn-primary" type=""><b>Enregistrer<b></button></td>
             </tr>
         </table>
         </form>
    
         
   
  </body>
  </html>
