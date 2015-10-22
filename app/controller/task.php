<?php
$context->setData($db->getTasks());         
$context->setPageUrl("task/list.php");

if (isset($_GET['add']))
    $context->setPageUrl("task/add.php");

else if (!empty($_GET['edit'])) {
    $context->setData($db->getTask($_GET['edit']));
    $context->setPageUrl("task/edit.php");}

else if (!empty($_GET['del']))
    $db->delTask($_GET['del']);
	
else if (!empty($_GET['id'])) {                       
    $context->setData($db->getTask($_GET['id']));
    $context->setPageUrl("task/view.php");} 

else if (!empty($_POST['new_task_identifier']) && !empty($_POST['new_task_summary']) ) {

	$duration = (!empty($_POST['new_task_expected_duration'])) ? $_POST['new_task_expected_duration'] : 0; 
    $comment = (!empty($_POST['new_task_description'])) ? $_POST['new_task_description'] : "";

    $db->addTask($_POST['new_task_identifier'], $_POST['new_task_summary']), $duration, $comment);
}
	
else if (!empty($_POST['edit_task_id']) && !empty($_POST['edit_task_identifier']) && !empty($_POST['edit_task_summary']) ) {

	$duration = (!empty($_POST['edit_task_expected_duration'])) ? $_POST['edit_task_expected_duration'] : 0; 
    $comment = (!empty($_POST['edit_task_description'])) ? $_POST['edit_task_description'] : "";
	
    $db->updateTask($_POST['edit_task_id'], $_POST['edit_task_identifier'], $_POST['edit_task_summary']), $duration, $comment);
}