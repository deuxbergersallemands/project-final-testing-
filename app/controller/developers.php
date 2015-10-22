<?php
$context->setData($db->getDeveloppers());         
$context->setPageUrl("developers/list.php");

if (isset($_GET['add']))
    $context->setPageUrl("developers/add.php");

else if (!empty($_GET['edit'])) {
    $context->setData($db->getDevelopper($_GET['edit']));
    $context->setPageUrl("developers/edit.php");}

else if (!empty($_GET['del']))
    $db->delDevelopper($_GET['del']);
	
else if (!empty($_GET['id'])) {                       
    $context->setData($db->getDevelopper($_GET['id']));
    $context->setPageUrl("developers/view.php");} 

else if (!empty($_POST['new_dev_name']) && !empty($_POST['new_dev_first_name']) ) {

    $comment = (!empty($_POST['new_dev_description'])) ? $_POST['new_dev_description'] : "";

    $db->addDevelopper($_POST['new_dev_name'], $_POST['new_dev_first_name']), $comment);
}
	
else if (!empty($_POST['edit_dev_id']) && !empty($_POST['edit_dev_name']) && !empty($_POST['edit_dev_first_name']) ) {

    $comment = (!empty($_POST['edit_dev_description'])) ? $_POST['edit_dev_description'] : "";
	
    $db->updateDevelopper($_POST['edit_dev_id'], $_POST['edit_dev_name'], $_POST['edit_dev_first_name']), $comment);
}
