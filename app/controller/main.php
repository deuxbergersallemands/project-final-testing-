<?php

require "model/Context.class.php";


$githubDB = new \model\GithubDatabase;


$context = new Context();
if (isset($_GET['github'])){    
	if (!empty($_POST['author']) && !empty($_POST['repository']))
	$githubDB->setGithubData($_POST['author'], $_POST['repository']);
}

$data = $githubDB->getGithubData();
//foreach ($githubDB->getGithubData() as $data) {
  $context->setGithubAuthor($data->author);
  $context->setGithubRepo($data->repository);
//}

if (isset($_GET['tasks']))
    include("controller/tasks.php");
	
else if (isset($_GET['userstories']))
    include("controller/userstories.php");

else if (isset($_GET['developers']))
    include("controller/developers.php");
	
else if (isset($_GET['sprints']))
    include("controller/sprints.php");

else if (isset($_GET['help'])) {
	include("controller/help.php");
}
	
include("view/frame.php");
