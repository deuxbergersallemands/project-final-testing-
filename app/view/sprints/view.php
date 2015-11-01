<?php $sprint = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Identifier:</th>
        <td class="table-td"><?php echo $sprint->sprintIdentifier; ?></td>
    </tr>
    <tr>
        <th>Duration:</th>
        <td class="table-td"><?php echo $sprint->sprintDuration; ?></td>
    </tr>
  
	<tr>
        <th>Description:</th>
        <td class="table-td"><?php echo $sprint->sprintDescription; ?></td>
    </tr>
</table>
