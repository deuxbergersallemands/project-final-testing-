<?php

<<<<<<< HEAD
$graph = new \model\graph
=======
require_once "../../model/PEAR/GraphViz.php";

$graph = new Image_GraphViz(true, array(), "PERT diagram");
$xml = new DOMDocument();
$xml->load("../../assets/out.xml");

$nodes = $xml->getElementsByTagName("node");


foreach ($nodes as $node)
    $graph->addNode($node->getAttribute("id"),
        array('label' => $node->getAttribute("label")));


$graph->image();
>>>>>>> bb8b47ee7ffd41c6cd54636dfa910c20d5ba9a2c
