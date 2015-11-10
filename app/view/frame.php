<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>
        <?php echo $context->getPageTitle(); ?>
    </title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/themes/base/jquery-ui.css">
</head>

<body id="<?php echo $context->getPageId(); ?>">
    <div class="header">
        <h3 class="title"><?php echo $context->getHeader(); ?></h3> 
    </div>

    <div class="body">
    <div class="menu">
        <ul>
            <li><a href="?userstories">Backlog</a></li>	
            <li><a href="?tasks">Tasks</a></li>	
            <li><a href="?sprints">Sprints</a></li>	
            <li><a href="?developers">Developers</a></li>	
        </ul>
    </div>

    <div class="content">
<?php
    include($context->getPageUrl());
?>

    
    </div>
    </div>
</body>
</html>
