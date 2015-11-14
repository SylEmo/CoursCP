<?php 
require_once ('src/jpgraph.php');
require_once ('src/jpgraph_line.php');

$datay1 = array(75,60,48,35,20,0);

$graph = new Graph(300,250);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('Burndown Chart');
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
