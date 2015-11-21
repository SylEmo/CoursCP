<?php 
require_once ('../lib/jpgraph/src/jpgraph.php');
require_once ('../lib/jpgraph/src/jpgraph_line.php');
require_once('connexion.php');



$req0 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=0";
$rs0=mysql_query($req0) or die (mysql_error());
$pr0=mysql_fetch_row($rs0);

$req1 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=1";
$rs1=mysql_query($req1) or die (mysql_error());
$pr1=mysql_fetch_row($rs1);

$req2 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=2";
$rs2=mysql_query($req2) or die (mysql_error());
$pr2=mysql_fetch_row($rs2);

$req3 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=3";
$rs3=mysql_query($req3) or die (mysql_error());
$pr3=mysql_fetch_row($rs3);

$req4 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=4";
$rs4=mysql_query($req4) or die (mysql_error());
$pr4=mysql_fetch_row($rs4);

$req5 = "select SUM(DIFFICULTE) from USERSTORY where IDSPRINT=5";
$rs5=mysql_query($req5) or die (mysql_error());
$pr5=mysql_fetch_row($rs5);

 $som=$pr0[0]+$pr1[0]+$pr2[0]+$pr3[0]+$pr4[0]+$pr5[0];

 $v2=$som-$pr1[0];
 $v3=$som-$pr1[0]-$pr2[0];
 $v4=$som-$pr1[0]-$pr2[0]-$pr3[0];
 $v5=$som-$pr1[0]-$pr2[0]-$pr3[0]-$pr4[0];
 $v6=$som-$pr1[0]-$pr2[0]-$pr3[0]-$pr4[0]-$pr5[0];


$datay1 = array($som,$v2,$v3,$v4,$v5,$v6);

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
$graph->xaxis->SetTickLabels(array('0','1','2','3','4','5'));
$graph->xgrid->SetColor('#E3E3E3');

$p1 = new LinePlot($datay1);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Difficulté');

$graph->legend->SetFrameWeight(1);
$graph->Stroke();

?>
