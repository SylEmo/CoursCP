<?php
$idtache = $_POST['tache'];
$idsprint = $_POST['sprint'];
$idprojet = $_POST['projet'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
require_once("Connexion.php");
require_once('../lib/client/GitHubClient.php');

$req = "SELECT GITUTIL, GITDEPOT FROM PROJET WHERE ID=".$idprojet;
$res = mysql_query($req) or die(mysql_error());

while($pr=mysql_fetch_assoc($res)) {
	$owner = $pr['GITUTIL'];//'Thomasgitt';
	$repo = $pr['GITDEPOT'];//'CdpTest1';
}



$client = new GitHubClient();
$client->setPage();
$client->setPageSize(100);
$commits = $client->repos->commits->listCommitsOnRepository($owner, $repo);
$sprint="";
$tache="";
$stopwhile=1;
$count = count($commits);
$result="";

$result.= "<table>";

while($stopwhile!=0){
	$count = count($commits);

	foreach($commits as $commit)
	{
        preg_match_all( '#\[(\w+)]#', $commit->getCommit()->getMessage(), $donnees);
        if(!empty($donnees[1][0]) && !empty($donnees[1][1])){
	        $sprint = $donnees[1][0]; 
		    $tache = $donnees[1][1];

		    if(strcmp($sprint,$idsprint)==0 && strcmp($tache,$idtache)==0){
			    $result.= "<tr>";
			    $result.= " <td>".$commit->getCommit()->getAuthor()->getName()."</td><td>".$commit->getCommit()->getMessage()."</td><td> </td><td>".$commit->getCommit()->getAuthor()->getDate()."</td>";
			    $result.= "</tr>";
			}
		}
	}

	if($count<100){
		$stopwhile=0;
	}else{
		$commits = $client->getNextPage();
	}

}


$result.= "</table>";
echo utf8_encode($result);
?>