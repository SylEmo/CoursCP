<?php
$idtache = $_POST['tache'];
$idsprint = $_POST['sprint'];

require_once("Verifier1.php");
session_start();
require_once("Connexion.php");
require_once('../lib/client/GitHubClient.php');

$owner = 'Thomasgitt';
$repo = 'CdpTest1';

$client = new GitHubClient();
$client->setPage();
$client->setPageSize(100);
$commits = $client->repos->commits->listCommitsOnRepository($owner, $repo);
$sprint="";
$tache="";
$stopwhile=1;
$count = count($commits);

echo "<table>";

while($stopwhile!=0){
	$count = count($commits);

	foreach($commits as $commit)
	{
	    /* @var $commit GitHubCommit */

	    $sprint=substr($commit->getCommit()->getMessage(),1,2);
	    $tache=substr($commit->getCommit()->getMessage(),5,2);

	    if(strcmp($sprint,$idsprint)==0 && strcmp($tache,$idtache)==0){
		    echo "<tr>";
		    echo " <td>".$commit->getCommit()->getAuthor()->getName()."</td><td>".$commit->getCommit()->getMessage()."</td><td> </td><td>".$commit->getCommit()->getAuthor()->getDate()."</td>";
		    echo "</tr>";
		}
	}

	if($count<100){
		$stopwhile=0;
	}else{
		$commits = $client->getNextPage();
	}

}


echo "</table>";

?>