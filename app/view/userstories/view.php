<?php $us = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Identifier:</th>
        <td class="table-td"><?php echo $us->usIdentifier; ?></td>
    </tr>
    <tr>
        <th>Summary:</th>
        <td class="table-td"><?php echo $us->usSummary; ?></td>
    </tr>
    <tr>
        <th>Priority:</th>
        <td class="table-td"><?php echo $us->usPriority; ?></td>
    </tr>
	<tr>
        <th>Difficulty:</th>
        <td class="table-td"><?php echo $us->usDifficulty; ?></td>
    </tr>
	<tr>
        <th>Description:</th>
        <td class="table-td"><?php echo $us->usDescription; ?></td>
    </tr>
</table>
