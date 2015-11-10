<?php

$db = new \model\UserstoryDatabase;
$sprints = new \model\SprintDatabase;
$tasks = new \model\TaskDatabase;

$context->setData($db->getUserStories());         
$context->setPageUrl("userstories/list.php");
$context->setHeader("Backlog");


if (isset($_GET['add']))
    $context->setPageUrl("userstories/add.php");
else if (!empty($_GET['manage'])) {
	$context->setData(
			array('us' 			=> $db->getUserStory($_GET['manage']),
					'sprints' 	=> $sprints->getSprints(),
					'tasks' 	=> $tasks->getTasks(),
					'sprintByUs'=> $sprints->getSprintsByUserstory($_GET['manage']),
					'taskByUs' 	=> $tasks->getTasksByUserstory($_GET['manage'])));

	$context->setPageUrl("userstories/manage.php");
}
else if (!empty($_GET['edit'])) {
    $context->setData($db->getUserStory($_GET['edit']));
    $context->setPageUrl("userstories/edit.php");
}
else if (!empty($_GET['del'])) {
    $db->delUserStory($_GET['del']);
    $context->setData($db->getUserStories());         
}
else if (!empty($_GET['id'])) { 
	$NbTask=0;
	$NbTaskDone=0;
	$NbTaskToDo=0;
	$task = $tasks -> getTasksByUserstory($_GET['id']);
	foreach($task as $task_Id){
		$NbTask++;
		if( $task_Id -> taskState=="ongoing")
		{   $db -> setUserStoryState($_GET['id'],"ongoing");
			break;
			}
		if( $task_Id -> taskState=="todo")
		{   $NbTaskToDo++; }
			
		if( $task_Id -> taskState=="done")
		{   $NbTaskDone++; }
	}
	if ($NbTask==$NbTaskDone) {$db -> setUserStoryState($_GET['id'],"done");}
	if ($NbTask==$NbTaskToDo) {$db -> setUserStoryState($_GET['id'],"todo");}
	
    $context->setData(array(
                       $db->getUserStory($_GET['id']),
                       $sprints->getSprintsByUserstory($_GET['id']),
                       $tasks->getTasksByUserstory($_GET['id'])));
    
    $context->setPageUrl("userstories/view.php");
} 
else if (!empty($_POST['new_us_identifier']) && !empty($_POST['new_us_summary']) ) {

	$priority = (!empty($_POST['new_us_priority'])) ? $_POST['new_us_priority'] : 0; 
    $difficulty = (!empty($_POST['new_us_difficulty'])) ? $_POST['new_us_difficulty'] : 0;
    $description = (!empty($_POST['new_us_description'])) ? $_POST['new_us_description'] : "";
	
    $db->addUserStory($_POST['new_us_identifier'], $_POST['new_us_summary'], $priority, $difficulty, $description);
    $context->setData($db->getUserStories());         
}
else if (!empty($_POST['edit_us_id']) && !empty($_POST['edit_us_identifier']) && !empty($_POST['edit_us_summary']) ) {

	$priority = (!empty($_POST['edit_us_priority'])) ? $_POST['edit_us_priority'] : 0; 
    $difficulty = (!empty($_POST['edit_us_difficulty'])) ? $_POST['edit_us_difficulty'] : 0;
    $description = (!empty($_POST['edit_us_description'])) ? $_POST['edit_us_description'] : "";
	
    $db->updateUserStory($_POST['edit_us_id'], $_POST['edit_us_identifier'], $_POST['edit_us_summary'], $priority, $difficulty, $description);
    $context->setData($db->getUserStories());         
}
else if (!empty($_POST['set_us_id'])) {

	$db ->removeTasksFromUserstory($_POST['set_us_id']);
	$sprints ->removeUserstoriesToSprint($_POST['set_us_id']);

	if(!empty($_POST['Sprints_Us']))
	{
		foreach($_POST['Sprints_Us'] as $Sprint_Id) {
			$sprints ->addUserstoryToSprint($_POST['set_us_id'],$Sprint_Id);
		}
	}
	
	if(!empty($_POST['Tasks_Us']))
	{
		foreach($_POST['Tasks_Us'] as $Task_Id){
			$db ->addTaskToUserstory($Task_Id,$_POST['set_us_id']);
		}
	}
}