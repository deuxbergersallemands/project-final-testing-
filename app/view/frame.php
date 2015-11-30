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

<div class="body ">
    <div class="menu">

        <div class="container-fluid">
            <div class="row">
                <div  class=" sidebar liste">
                    <ul class="nav ">
                        <li class="menu-p">Dashboard</li>
                        <li class="menu-li"><a href="?userstories">Backlog </a></li>
                        <li class="menu-li"><a href="?tasks">Tasks </a></li>
                        <li class="menu-li"><a href="?sprints">Sprints</a></li>
                        <li class="menu-li"><a href="?developers">Developers</a></li>
                        <li class="menu-li"><a href="?github">GitHub informations</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="content">

<?php
    require $context->getPageUrl();
?>


    </div>
</div>

</body>
</html>
