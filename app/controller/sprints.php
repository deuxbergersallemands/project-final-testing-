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
	$usSprint = $us->getUserstoriesBySprint($_GET['id']);
	$tasks = array();
	
	foreach ($usSprint as $us)
		array_merge($tasks, $task->getTasksByUserstory($us->usId));
	                   
    $context->setData(array(
    					'sprint' => $db->getSprint($_GET['id']),
    					'tasks' => $tasks));
    
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
