<?php

  $db = new \model\HelpDatabase;
  $context->setData($db->getHelp());         

  $context->setPageUrl("help.php");
  $context->setHeader("Help");