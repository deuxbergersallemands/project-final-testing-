<?php

require_once 'PEAR/GraphViz.php';

class Node
{
    public $id;
    public $label;

    public function __construct($i, $lbl)
    {
        $this->id = $i;
        $this->label = $lbl;
    }
}


class Edge
{
    public $nodeId1;
    public $nodeId2;

    public $label;


    public function __construct($nid1, $nid2, $lbl = "")
    {
        $this->nodeId1 = $nid1;
        $this->nodeId2 = $nid2;

        $this->label = $lbl;
    }
}


class Graph
{
    private $_nodes = array();
    private $_edges = array();

    private $_fontsize;


    public function __construct($fontsize = 15) {
        $this->_fontsize = $fontsize;
    }

    public function addNode(Node $n) {
        $this->_nodes[] = $n;
    }

    public function addEdge(Edge $e) {
        $this->_edges[] = $e;
    }

    public function render()
    {
        $graph = new Image_GraphViz(true, array(), "PERT diagram");

        foreach ($this->_nodes as $node)
            $graph->addNode($node->id, array('label' => $node->label));

        foreach ($this->_edges as $edge)
            $graph->addEdge(array($edge->nodeId1 => $edge->nodeId2),
                            array('label' => $edge->label));

        $graph->image();
    }

    public function save($file = "out.def")
    {
        $graph = new Image_GraphViz(true, array(), "PERT diagram");

        foreach ($this->_nodes as $node)
            $graph->addNode($node->id, array('label' => $node->label));

        foreach ($this->_edges as $edge)
            $graph->addEdge(array($edge->nodeId1 => $edge->nodeId2),
                            array('label' => $edge->label));

        $graph->save();
    }
}


/*$graph = new Graph();
$graph->addNode(new Node(1, "truc"));
$graph->addNode(new Node(2, "bidule"));

$graph->addEdge(new Edge(1, 2, "T1"));

$graph->render();*/
