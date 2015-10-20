<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $context->getPageTitle(); ?>
    </title>
</head>

<body id="<?php echo $context->getPageId(); ?>">



<?php
    include($context->getPageUrl());
?>


</body>
</html>
