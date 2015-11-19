<?php $data = $context->getData();

foreach ($data as $entry) { ?>

  <h3><?php echo $entry->subject; ?></h3>
  <p><?php echo $entry->description; ?></p>
  
<?php } ?>