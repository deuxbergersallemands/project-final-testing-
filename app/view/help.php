<?php $data = $context->getData();

foreach ($data as $entry) { ?>
  <h3><?echo $entry->subject;?><h3>
  <p><?echo $entry->description;?><p>
<? } ?>