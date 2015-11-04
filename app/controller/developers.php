<?php

// require "model/DeveloperDatabase.class.php"
// $db = new DeveloperDatabase;

$context->setData($db->getDevelopers());         
$context->setPageUrl("developers/list.php");
$context->setHeader("Developers");


if (isset($_GET['add']))
    $context->setPageUrl("developers/add.php");

else if (!empty($_GET['manage'])) {
	//$task = new \model\DeveloperDatabase;
	//$us = new \model\UserstoryDatabase;

	$context->setData(
			array('dev' 	=> $db->getDeveloper($_GET['manage']),
					'tasks' => $db->getTasks()));

	$context->setPageUrl("developers/manage.php");
}
else if (!empty($_GET['edit'])) {
    $context->setData($db->getDeveloper($_GET['edit']));
    $context->setPageUrl("developers/edit.php");}

else if (!empty($_GET['del'])) {
    $db->delDeveloper($_GET['del']);
    $context->setData($db->getDevelopers());            // Update the list.
}	
else if (!empty($_GET['id'])) {                       
    $context->setData($db->getDeveloper($_GET['id']));
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
	$taskIds = array_filter(array_keys($_POST),
		function($str) {
			if (preg_match("/^set_developer_task_id_([0-9]+)$/", $str, $matches))
				return $matches[1];
		});
		
	// TODO
}
