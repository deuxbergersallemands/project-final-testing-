<?php


require_once "../../model/PEAR/GraphViz.php";

$graph = new Image_GraphViz(true, array(), "PERT diagram");
$xml = new DOMDocument();
$xml->load("../../assets/out.xml");

$nodes = $xml->getElementsByTagName("node");
$edges = $xml->getElementsByTagName("edge");


foreach ($nodes as $node)
    $graph->addNode($node->getAttribute("id"),
        array('label' => $node->getAttribute("label")));

foreach ($edges as $edge)
    $graph->addEdge(
        array($edge->getAttribute("nid1") => $edge->getAttribute("nid2")),
        array('label' => $edge->getAttribute("label")));

$graph->image();
