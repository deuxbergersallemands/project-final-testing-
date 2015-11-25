<?php

require_once "../../model/PEAR/GraphViz.php";

$graph = new Image_GraphViz(true, array(), "PERT diagram");
$xml = new DOMDocument();
$xml->load("../../assets/out.xml");

$nodes = $xml->getElementsByTagName("node");


foreach ($nodes as $node)
    $graph->addNode($node->getAttribute("id"),
        array('label' => $node->getAttribute("label")));


$graph->image();
