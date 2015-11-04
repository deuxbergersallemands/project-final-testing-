<?php

$db = new \model\DeveloperDatabase;

$context->setData($db->getDevelopers());         
$context->setPageUrl("developers/list.php");
$context->setHeader("Developers");


if (isset($_GET['add']))
    $context->setPageUrl("developers/add.php");

else if (!empty($_GET['manage'])) {		// the view needs developer and tasks list.
	$taskDb = new \model\TaskDatabase;
	$dev = $db->getDeveloper($_GET['manage']);
	
	$tasks = array_filter($taskDb->getTasks(),	// The already given tasks to other developers
			function($task) {					// are not listed.
				global $dev;					// Otherwise, it's not possible to use $dev.
				return ($task->devId == null || $task->devId == $dev->devId);
			});
	
	$tasksDevIds = array_map(				// The manage view needs only IDs of already given tasks.
			function($task) { return $task->taskId; },
			$taskDb->getTasksByDeveloper($dev->devId));

	$context->setData(array($dev,
							$tasks,
    						$tasksDevIds));

	$context->setPageUrl("developers/manage.php");
}
else if (!empty($_GET['edit'])) {		
    $context->setData($db->getDeveloper($_GET['edit']));
    $context->setPageUrl("developers/edit.php");}

else if (!empty($_GET['del'])) {
    $db->delDeveloper($_GET['del']);
    $context->setData($db->getDevelopers());         // Update the list, after edit.   
}	
else if (!empty($_GET['id'])) {		// the view needs developer and associated tasks list.
	$taskDb = new \model\TaskDatabase;
	
    $context->setData(array($db->getDeveloper($_GET['id']),
    							$taskDb->getTasksByDeveloper($_GET['id'])));
    
    $context->setPageUrl("developers/view.php");
} 
else if (!empty($_POST['new_dev_name']) && !empty($_POST['new_dev_first_name']) ) {

    $comment = (!empty($_POST['new_dev_description'])) ? $_POST['new_dev_description'] : "";

    $db->addDeveloper($_POST['new_dev_name'], $_POST['new_dev_first_name'], $comment);
    $context->setData($db->getDevelopers());         
}
else if (!empty($_POST['edit_dev_id']) && !empty($_POST['edit_dev_name']) && !empty($_POST['edit_dev_first_name']) ) {

    $comment = (!empty($_POST['edit_dev_description'])) ? $_POST['edit_dev_description'] : "";
	
    $db->updateDeveloper($_POST['edit_dev_id'], $_POST['edit_dev_name'], $_POST['edit_dev_first_name'], $comment);
    $context->setData($db->getDevelopers());         
}
else if (!empty($_POST['set_developer_id'])) {
	$taskDb = new \model\TaskDatabase();
	
	$taskIds = preg_filter("/^set_developer_task_id_([0-9]+)$/", "\\1", array_keys($_POST));
	$tasksDev = $taskDb->getTasksByDeveloper($_POST['set_developer_id']);
	
	foreach ($tasksDev as $task)						// Remove all the tasks already given.
		$taskDb->removeDeveloperFromTask($task->taskId);
	
	foreach ($taskIds as $taskId)						// And set with the news given.
		$taskDb->setDeveloperToTask($_POST['set_developer_id'], $taskId);
}
