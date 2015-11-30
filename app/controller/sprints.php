<?php

$sprintdb = new \model\SprintDatabase;
$taskdb = new \model\TaskDatabase;
$usdb = new \model\UserstoryDatabase;
$devdb = new \model\DeveloperDatabase;


$context->setData($sprintdb->getSprints());
$context->setPageUrl("sprints/list.php");
$context->setHeader("Sprints");



if (isset($_GET['add']))
    $context->setPageUrl("sprints/add.php");

else if (!empty($_GET['edit'])) {
    $context->setData($sprintdb->getSprint($_GET['edit']));
    $context->setPageUrl("sprints/edit.php");}

else if (!empty($_GET['del'])) {
    $sprintdb->delSprint($_GET['del']);
    $context->setData($sprintdb->getSprints());
}
else if (!empty($_GET['id'])) {    
    $context->setData(array(
    					'sprint' => $sprintdb->getSprint($_GET['id']),
    					'tasks' => $taskdb->getTasksBySprint($_GET['id'])));
    
    $context->setPageUrl("sprints/view.php");
} 
else if (!empty($_POST['new_sprint_identifier']) && !empty($_POST['new_sprint_duration']) ) {

    $comment = (!empty($_POST['new_sprint_description'])) ? $_POST['new_sprint_description'] : "";

    $sprintdb->addSprint($_POST['new_sprint_identifier'], $_POST['new_sprint_duration'], $comment);
    $context->setData($sprintdb->getSprints());
}
else if (!empty($_POST['edit_sprint_id']) && !empty($_POST['edit_sprint_identifier']) && !empty($_POST['edit_sprint_duration']) ) {

    $comment = (!empty($_POST['edit_sprint_description'])) ? $_POST['edit_sprint_description'] : "";
	
    $sprintdb->updateSprint($_POST['edit_sprint_id'], $_POST['edit_sprint_identifier'], $_POST['edit_sprint_duration'], $comment);
    $context->setData($sprintdb->getSprints());
}
else if (!empty($_GET['pert'])) {
    $context->setData("view/sprints/graph.php");
    $context->setPageUrl("sprints/pert.php");
}
else if (!empty($_GET['gantt'])) {
    $tasks = array();
    $devs = array();

    // Get all tasks in the sprint and dependOn tasks.
    foreach ($taskdb->getTasksBySprint($_GET['gantt']) as $task)
        $tasks[] = array('task' => $task, 'dependon' => $taskdb->getDependOnTasks($task->taskId));

    // Get all developers, and set the affected tasks to null.
    foreach ($devdb->getDevelopers() as $dev)
        $devs[] = array('dev' => $dev, "workload" => 0, "tasks" => array());

    // If there are no tasks or no devs, we don't continue.
    if (!empty($devs) && !empty($tasks)) {
        while (!empty($tasks)) {                // While there is a task, we continue.
            // Search a good task.
            $goodTask = array_reduce($tasks,
                function($t1, $t2) use ($tasks) {
                    // Compute dependOn task number for the first task.

                    // Return the task with the littlest dependOn task number
                    if (empty($t1)) return $t2;
                    return (count($t1['dependon']) < count($t2['dependon'])) ? $t1 : $t2;
                });

            // Search the dev with the smallest workload.
            $laziestDev = array_reduce($devs, function($d1, $d2) {
                return $d1['workload'] < $d2['workload'] ? $d1 : $d2;
            });

            // Affect task to dev.
            $idev = array_search($laziestDev, $devs);
            $devs[$idev]['tasks'][] = array('task' => $goodTask['task'],
                                            'duration' => $goodTask['task']->taskExpectedDuration);
            $devs[$idev]['workload'] += $goodTask['task']->taskExpectedDuration;

            // Remove affected task from tasks.
            unset($tasks[array_search($goodTask, $tasks)]);
        }
    }

    $devWithMaxWorkload = array_reduce($devs, function($dev1, $dev2) {
        return $dev1['workload'] < $dev2['workload'] ? $dev2 : $dev1;
    });

    $context->setData(array('devs' => $devs,
            'maxWorkLoad' => $devWithMaxWorkload['workload']));

    $context->setPageUrl("sprints/gantt.php");
}