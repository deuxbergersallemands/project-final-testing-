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
    $ussDependent = $db->getDependentUserStories($_GET['manage']);
    
    // A user story can depend only on other user stories, and on not already dependent userstories.
    $uss = array_filter($db->getUserStories(), function($us) {
        global $ussDependent;
        return !in_array($us, $ussDependent) && $us->usId != $_GET['manage'];
    });
    
	$context->setData(
			array('us' 			  => $db->getUserStory($_GET['manage']),
			        'uss'         => $uss,
			        'ussDependOn' => $db->getDependOnUserstories($_GET['manage']),
					'sprints' 	  => $sprints->getSprints(),
					'tasks' 	  => $tasks->getTasks(),
					'sprintByUs'  => $sprints->getSprintsByUserstory($_GET['manage']),
					'taskByUs' 	  => $tasks->getTasksByUserstory($_GET['manage'])));

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
                       'us' => $db->getUserStory($_GET['id']),
                       'sprints' => $sprints->getSprintsByUserstory($_GET['id']),
                       'tasks' => $tasks->getTasksByUserstory($_GET['id'])));
    
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

    $db->removeDependOnUserstories($_POST['set_us_id']);
	$db ->removeTasksFromUserstory($_POST['set_us_id']);
	$sprints->removeUserstoriesToSprint($_POST['set_us_id']);

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
	
	if (!empty($_POST['ussDependOn_usIds']))
	    foreach ($_POST['ussDependOn_usIds'] as $usId)
	        $db->addDependentUserstory($_POST['set_us_id'], $usId);
	
}
else if (isset($_GET['BDC'])) {
    include("assets/php/function.php");
    $TotalDif = 0; $SommeDif = 0; $nbsp = 0;
    $array = array(); $arrayDi = array(); $arrayPer = array();
     
    foreach ($db->getUserStories() as $usD) {
        $TotalDif=$usD-> usDifficulty + $TotalDif;
    }
    $arrayDi[]=$TotalDif; $arrayPer[]=$TotalDif; $array[]="";

    foreach ($sprints->getSprints() as $sprint) {
        $nbsp++;
        $array[] = $sprint->sprintIdentifier;
        foreach ($db->getUserstoriesBySprint($sprint -> sprintId)as $Us) {
            $SommeDif= $Us-> usDifficulty + $SommeDif;
        }
        $arrayDi[]=$TotalDif-$SommeDif;
    }
    if($nbsp!=0){
        $nb=$TotalDif/$nbsp;
        for($i=0; $i< $nbsp; $i++) {
            $TotalDif = $TotalDif-$nb;
            $arrayPer[]=$TotalDif;
        }
        graph($arrayPer, $arrayDi, $array, $context );
        $context->setPageUrl("userstories/BDC.php");
    }
    else $context->setPageUrl("userstories/list.php");
}