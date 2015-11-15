<?php function graph(array $arrayPer, array $arrayDi, array $array,Context $context) {
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');

$graph = new Graph(500,500);
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;

$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false);
$graph->title->Set('BurnDown Chart');
$graph->SetBox(false);

$graph->img->SetAntiAliasing();

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xgrid->Show();
$graph->xgrid->SetLineStyle("solid");
$graph->xaxis->SetTickLabels($array);
$graph->xgrid->SetColor('#E3E3E3');

$p1 = new LinePlot($arrayDi);
$graph->Add($p1);
$p1->SetColor("#6495ED");
$p1->SetLegend('Ideal Effort');

$p2 = new LinePlot($arrayPer);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Effort Remaining');

$graph->legend->SetFrameWeight(1);

if (file_exists($context::BDC_IMG)) unlink($context::BDC_IMG);
$graph->Stroke($context::BDC_IMG);
} ?>