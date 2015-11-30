<?php

require "model/Context.class.php";

session_start();

$context = new Context();

if (isset($_GET['tasks']))
    include("controller/tasks.php");
	
else if (isset($_GET['userstories']))
    include("controller/userstories.php");

else if (isset($_GET['developers']))
    include("controller/developers.php");
	
else if (isset($_GET['sprints']))
    include("controller/sprints.php");

else if (isset($_GET['github'])) {
	$context->setPageUrl("github.php");
}

if (!empty($_POST['author']) && !empty($_POST['repository'])) {
    $_SESSION['author'] = $_POST['author'];
    $_SESSION['repository'] = $_POST['repository'];
}
	
include("view/frame.php");
