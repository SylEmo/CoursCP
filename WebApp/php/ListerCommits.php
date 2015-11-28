<?php
$idtache = $_POST['tache'];
$idsprint = $_POST['sprint'];

require_once("Verifier1.php");
if(!isset($_SESSION)) {
	session_start();
}
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
        preg_match_all( '#\[(\w+)]#', $commit->getCommit()->getMessage(), $donnees);
        if(!empty($donnees[1][0]) && !empty($donnees[1][1])){
	        $sprint = $donnees[1][0]; 
		    $tache = $donnees[1][1];

		    if(strcmp($sprint,$idsprint)==0 && strcmp($tache,$idtache)==0){
			    echo "<tr>";
			    echo " <td>".$commit->getCommit()->getAuthor()->getName()."</td><td>".$commit->getCommit()->getMessage()."</td><td> </td><td>".$commit->getCommit()->getAuthor()->getDate()."</td>";
			    echo "</tr>";
			}
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