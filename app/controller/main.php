<?php

include_once("model/Context.class.php");
include_once("model/Database.class.php");

$context = new Context();
$db = new Database();


if (isset($_GET['task']))
    include("controller/task.php");
	
else if (isset($_GET['userstories']))
    include("controller/userstories.php");

else if (isset($_GET['developers']))
    include("controller/developers.php");
	
else if (isset($_GET['sprints']))
    include("controller/developers.php");
	
include("view/frame.php");
