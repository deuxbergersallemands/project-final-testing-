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
			function($task) use ($dev) {		// are not listed.
												// Otherwise, it's not possible to use $dev.
				return ($task->devId == null || $task->devId == $dev->devId);
			});

	$context->setData(array('dev' => $dev,
							'tasks' => $tasks,
    						'tasksDev' => $taskDb->getTasksByDeveloper($dev->devId)));

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
	
    $context->setData(array('dev' => $db->getDeveloper($_GET['id']),
    					    'tasksDev' => $taskDb->getTasksByDeveloper($_GET['id'])));
    
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
	
	if (!empty($_POST['developer_task_id'])) {
		$taskDb->removeTasksFromDeveloper($_POST['set_developer_id']);			// Remove all the given tasks.
	
		foreach ($_POST['developer_task_id'] as $taskId)						// And set with the news given.
			$taskDb->setDeveloperToTask($_POST['set_developer_id'], $taskId);
	}
	else
		$taskDb->removeTasksFromDeveloper($_POST['set_developer_id']);
}
