<?php

// require "model/SprintDatabase.class.php"
// $db = new SprintDatabase;

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
    $context->setData($db->getSprint($_GET['id']));
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
