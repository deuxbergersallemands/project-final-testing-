<?php


$db = new \model\SprintDatabase;
$task = new \model\TaskDatabase;
$us = new \model\UserstoryDatabase;

$context->setData($db->getSprints());         
$context->setPageUrl("sprints/list.php");
$context->setHeader("Sprints");


if (isset($_GET['add']))
    $context->setPageUrl("sprints/add.php");

else if (!empty($_GET['edit'])) {
    $context->setData($db->getSprint($_GET['edit']));
    $context->setPageUrl("sprints/edit.php");}

else if (!empty($_GET['del'])) {
    $db->delSprint($_GET['del']);
    $context->setData($db->getSprints());         
}
else if (!empty($_GET['id'])) {    
    $context->setData(array(
    					'sprint' => $db->getSprint($_GET['id']),
    					'tasks' => $task->getTasksBySprint($_GET['id'])));
    
    $context->setPageUrl("sprints/view.php");
} 
else if (!empty($_POST['new_sprint_identifier']) && !empty($_POST['new_sprint_duration']) ) {

    $comment = (!empty($_POST['new_sprint_description'])) ? $_POST['new_sprint_description'] : "";

    $db->addSprint($_POST['new_sprint_identifier'], $_POST['new_sprint_duration'], $comment);
    $context->setData($db->getSprints());         
}
else if (!empty($_POST['edit_sprint_id']) && !empty($_POST['edit_sprint_identifier']) && !empty($_POST['edit_sprint_duration']) ) {

    $comment = (!empty($_POST['edit_sprint_description'])) ? $_POST['edit_sprint_description'] : "";
	
    $db->updateSprint($_POST['edit_sprint_id'], $_POST['edit_sprint_identifier'], $_POST['edit_sprint_duration'], $comment);
    $context->setData($db->getSprints());         
}
else if (!empty($_GET['pert'])) {
<<<<<<< HEAD

    $graph = new \model\Graph();

    $graph->addNode(new Node(1, "truc"));
    $graph->addNode(new Node(2, "bidule"));
    $graph->addEdge(new Edge(1, 2, "T1"));

    $graph->render("out.def");

    $context->setData("out.def");
=======
    $xml = new \SimpleXMLElement("<root></root>");
    $tasks = $task->getTasksBySprint($_GET['pert']);

    foreach ($tasks as $t) {
        $node = $xml->addChild("node");
        $node->addAttribute("id", $t->taskId);
        $node->addAttribute("label", $t->taskIdentifier);
    }

    $xml->saveXML("assets/out.xml");

    $context->setData("view/sprints/graph.php");
>>>>>>> bb8b47ee7ffd41c6cd54636dfa910c20d5ba9a2c
    $context->setPageUrl("sprints/pert.php");
}
