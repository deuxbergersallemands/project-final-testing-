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

    <div class="content">
<?php
    include($context->getPageUrl());
?>

    
    </div>
</body>
</html>
