<?php

require "assets/git/github-php-client-master/client/GitHubClient.php";


$taskdb = new \model\TaskDatabase;
$devdb = new \model\DeveloperDatabase;
$usdb = new \model\UserstoryDatabase;
$sprintdb = new \model\SprintDatabase;

$context->setData($taskdb->getTasks());
$context->setPageUrl("tasks/list.php");
$context->setHeader("Tasks");


if (isset($_GET['add']))
    $context->setPageUrl("tasks/add.php");

else if (!empty($_GET['manage'])) {
    $tasksDependent = $taskdb->getDependentTasks($_GET['manage']);
    $tss = array_filter($taskdb->getTasks(),
        function($tasks) {
            global $tasksDependent;
            return !in_array($tasks, $tasksDependent) && $tasks->taskId != $_GET['manage'];
        });

    $context->setData(
        array('task' 	=> $taskdb->getTask($_GET['manage']),
            'tss'         => $tss,
            'tasksDependOn' => $taskdb->getDependOnTasks($_GET['manage']),
            'devs' 	=> $devdb->getDevelopers(),
            'usByTask' 	=> $usdb->getUserstoriesByTask($_GET['manage']),
            'us' 	=> $usdb->getUserStories()));

    $context->setPageUrl("tasks/manage.php");
}
else if (!empty($_GET['edit'])) {
    $context->setData($taskdb->getTask($_GET['edit']));
    $context->setPageUrl("tasks/edit.php");
}
else if (!empty($_GET['del'])) {
    $taskdb->delTask($_GET['del']);
    $context->setData($taskdb->getTasks());
}
else if (!empty($_GET['id'])) {
    $client = new GitHubClient;
    $commits = array();

    if (!empty($_SESSION['author']) && !empty($_SESSION['repository'])) {
        $commits = $client->repos->commits->listCommitsOnRepository(
            $_SESSION['author'],
            $_SESSION['repository']);
    }

    $context->setData(
        array('task' => $taskdb->getTask($_GET['id']),
            'devTask' => $devdb->getDeveloperByTask($_GET['id']),
            'ussTask' => $usdb->getUserstoriesByTask($_GET['id']),
            'commits' => $commits));

    $context->setPageUrl("tasks/view.php");
}
else if (!empty($_POST['new_task_identifier']) && !empty($_POST['new_task_summary']) ) {

    $duration = (!empty($_POST['new_task_expected_duration'])) ? $_POST['new_task_expected_duration'] : 0;
    $comment = (!empty($_POST['new_task_description'])) ? $_POST['new_task_description'] : "";

    $taskdb->addTask($_POST['new_task_identifier'], $_POST['new_task_summary'], $duration, $comment);
    $context->setData($taskdb->getTasks());
}
else if (!empty($_POST['edit_task_id']) && !empty($_POST['edit_task_identifier']) && !empty($_POST['edit_task_summary']) ) {

    $duration = (!empty($_POST['edit_task_expected_duration'])) ? $_POST['edit_task_expected_duration'] : 0;
    $comment = (!empty($_POST['edit_task_description'])) ? $_POST['edit_task_description'] : "";

    $taskdb->updateTask($_POST['edit_task_id'], $_POST['edit_task_identifier'], $_POST['edit_task_summary'], $duration, $comment);
    $context->setData($taskdb->getTasks());
}
else if (!empty($_POST['set_task_id'])) {
    $taskdb->removeDependOnTasks($_POST['set_task_id']);

    if (!empty($_POST['set_task_state']))
        $taskdb->setTaskState($_POST['set_task_id'], $_POST['set_task_state']);

    if (!empty($_POST['set_task_developer_id'])) {
        $taskdb->removeDeveloperFromTasks($_POST['set_task_id']);
        $taskdb->setDeveloperToTask($_POST['set_task_developer_id'], $_POST['set_task_id']);
    } else if (isset($_POST['set_task_developer_id']) && empty($_POST['set_task_developer_id']))
        $taskdb->removeDeveloperFromTask($_POST['set_task_id']);

    if (!empty($_POST['tasksDependOn_tsIds']))
        foreach ($_POST['tasksDependOn_tsIds'] as $taskId)
            $taskdb->addDependentTask($_POST['set_task_id'], $taskId);


    if (!empty($_POST['userstories_task'])) {
        $usdb->removeTasksFromUserstory($_POST['set_task_id']);
        foreach ($_POST['userstories_task'] as $Us_Id) {
            $usdb->addTaskToUserstory($_POST['set_task_id'], $Us_Id);
        }
    }
}