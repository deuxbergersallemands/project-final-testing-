<?php

  $db = new \model\HelpDatabase;
  $context->setData($db->getHelp());         

  $context->setPageUrl("help.php");
  $context->setHeader("Help");

  require_once('assets/git/github-php-client-master/client/GitHubClient.php');