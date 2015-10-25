<?php
$context->setData($db->getUserStories());         
$context->setPageUrl("userstories/list.php");

if (isset($_GET['add']))
    $context->setPageUrl("userstories/add.php");

else if (!empty($_GET['edit'])) {
    $context->setData($db->getUserStory($_GET['edit']));
    $context->setPageUrl("userstories/edit.php");}

else if (!empty($_GET['del']))
    $db->delUserStory($_GET['del']);
	
else if (!empty($_GET['id'])) {                       
    $context->setData($db->getUserStory($_GET['id']));
    $context->setPageUrl("userstories/view.php");
} 
else if (!empty($_POST['new_us_identifier']) && !empty($_POST['new_us_summary']) ) {

	$priority = (!empty($_POST['new_us_priority'])) ? $_POST['new_us_priority'] : 0; 
    $difficulty = (!empty($_POST['new_us_difficulty'])) ? $_POST['new_us_difficulty'] : 0;
    $description = (!empty($_POST['new_us_description'])) ? $_POST['new_us_description'] : "";
	
    $db->addUserStory($_POST['new_us_identifier'], $_POST['new_us_summary'], $priority, $difficulty, $description);
}
else if (!empty($_POST['edit_us_id']) && !empty($_POST['edit_us_identifier']) && !empty($_POST['edit_us_summary']) ) {

	$priority = (!empty($_POST['edit_us_priority'])) ? $_POST['edit_us_priority'] : 0; 
    $difficulty = (!empty($_POST['edit_us_difficulty'])) ? $_POST['edit_us_difficulty'] : 0;
    $description = (!empty($_POST['edit_us_description'])) ? $_POST['edit_us_description'] : "";
	
    $db->updateUserStory($_POST['edit_us_id'], $_POST['edit_us_identifier'], $_POST['edit_us_summary'], $priority, $difficulty, $description);
}
