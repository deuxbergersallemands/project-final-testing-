<?php

require "model/Context.class.php";


$context = new Context();

if (isset($_GET['tasks']))
    include("controller/tasks.php");
	
else if (isset($_GET['userstories']))
    include("controller/userstories.php");

else if (isset($_GET['developers']))
    include("controller/developers.php");
	
else if (isset($_GET['sprints']))
    include("controller/sprints.php");
	
include("view/frame.php");
