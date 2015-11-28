<?php 
require_once ('../lib/jpgraph/src/jpgraph.php');
require_once ('../lib/jpgraph/src/jpgraph_line.php');
require_once('Connexion.php');

$id_pr=$_GET['id'];

$req="SELECT SUM(USERSTORY.DIFFICULTE) AS DIFF, SPRINT.NUMERO FROM USERSTORY, SPRINT WHERE USERSTORY.IDPROJET =$id_pr AND USERSTORY.IDSPRINT = SPRINT.ID GROUP BY USERSTORY.IDSPRINT";
$rs=mysql_query($req) or die (mysql_error());

$nb_sprint=0; // le nombre de sprint.
$som_diff=0;  // la somme totale des difficultes de tous les sprints d'un projet.
$i=0;
$data=array();
while($pr=mysql_fetch_assoc($rs))
{
 $nb_sprint++;
 $som_diff+=$pr['DIFF'];
 $tab[$i]=$pr['DIFF'];
 for($j=0;$j<=$i;$j++){
 $datay1[$j]+=$pr['DIFF'];
 }
 $i++;
}
$datay1[sizeof($datay1)]=0;

for($j=0;$j<=sizeof($datay1);$j++){
 $data[$j]=$j;
}


$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('BurndownChart');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($data);
$graph->xgrid->SetColor('#E3E3E3');

$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Difficulté');

$graph->legend->SetFrameWeight(1);
$graph->Stroke();

?>
