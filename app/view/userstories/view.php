<?php $us = $context->getData(); ?>

<table>
    <tr>
        <th>Identifier:</th>
        <td><?php echo $us->usIdentifier; ?></td>
    </tr>
    <tr>
        <th>Summary:</th>
        <td><?php echo $us->usSummary; ?></td>
    </tr>
    <tr>
        <th>Priority:</th>
        <td><?php echo $us->usPriority; ?></td>
    </tr>
	<tr>
        <th>Difficulty:</th>
        <td><?php echo $us->usDifficulty; ?></td>
    </tr>
	<tr>
        <th>Description:</th>
        <td><?php echo $us->usDescription; ?></td>
    </tr>
</table>
