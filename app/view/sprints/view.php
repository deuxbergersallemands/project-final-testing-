<?php $sprint = $context->getData(); ?>

<table>
    <tr>
        <th>Identifier:</th>
        <td><?php echo $sprint->sprintIdentifier; ?></td>
    </tr>
    <tr>
        <th>Duration:</th>
        <td><?php echo $sprint->sprintDuration; ?></td>
    </tr>
  
	<tr>
        <th>Description:</th>
        <td><?php echo $sprint->sprintDescription; ?></td>
    </tr>
</table>
