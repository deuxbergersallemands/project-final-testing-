<?php

$db = new \model\TaskDatabase;

$context->setData($db->getTasks());         
$context->setPageUrl("tasks/list.php");
$context->setHeader("Tasks");


if (isset($_GET['add']))
    $context->setPageUrl("tasks/add.php");

else if (!empty($_GET['manage'])) {
	$dev = new \model\DeveloperDatabase;
	$us = new \model\UserstoryDatabase;
	
	$context->setData(
			array('task' 	=> $db->getTask($_GET['manage']),
					'devs' 	=> $dev->getDevelopers(),
					'us' 	=> $us->getUserStories()));
	
	$context->setPageUrl("tasks/manage.php");
}
else if (!empty($_GET['edit'])) {
    $context->setData($db->getTask($_GET['edit']));
    $context->setPageUrl("tasks/edit.php");
}
else if (!empty($_GET['del'])) {
    $db->delTask($_GET['del']);
    $context->setData($db->getTasks());         
}	
else if (!empty($_GET['id'])) {                       
    $context->setData($db->getTask($_GET['id']));
    $context->setPageUrl("tasks/view.php");
} 
else if (!empty($_POST['new_task_identifier']) && !empty($_POST['new_task_summary']) ) {

	$duration = (!empty($_POST['new_task_expected_duration'])) ? $_POST['new_task_expected_duration'] : 0; 
    $comment = (!empty($_POST['new_task_description'])) ? $_POST['new_task_description'] : "";

    $db->addTask($_POST['new_task_identifier'], $_POST['new_task_summary'], $duration, $comment);
    $context->setData($db->getTasks());         
}
else if (!empty($_POST['edit_task_id']) && !empty($_POST['edit_task_identifier']) && !empty($_POST['edit_task_summary']) ) {

	$duration = (!empty($_POST['edit_task_expected_duration'])) ? $_POST['edit_task_expected_duration'] : 0; 
    $comment = (!empty($_POST['edit_task_description'])) ? $_POST['edit_task_description'] : "";
	
    $db->updateTask($_POST['edit_task_id'], $_POST['edit_task_identifier'], $_POST['edit_task_summary'], $duration, $comment);
    $context->setData($db->getTasks());         
}
else if (!empty($_POST['set_task_id'])) {
	
	if (!empty($_POST['set_task_state']))
		$db->setTaskState($_POST['set_task_id'], $_POST['set_task_state']);
	
	if (!empty($_POST['set_task_developer_id']))
		$db->setDeveloperToTask($_POST['set_task_developer_id'], $_POST['set_task_id']);
	
	else if (isset($_POST['set_task_developer_id']) && empty($_POST['set_task_developer_id']))
		$db->removeDeveloperFromTask($_POST['set_task_id']);
	
		
	if(!empty($_POST['userstories_task']))
	{
		$us = new \model\UserstoryDatabase;
		foreach($_POST['userstories_task'] as $Us_Id){
			$us ->addTaskToUserstory($_POST['set_task_id'],$Us_Id);
		}
	}
		
	
}
