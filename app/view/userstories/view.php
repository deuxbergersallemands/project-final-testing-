<?php 
    $data = $context->getData();
    $us = $data[0];
    $sprints = $data[1];
    $tasks = $data[2];
?>

<table class="table-list view">
    <tr>
        <th>Identifier:</th>
        <td class="table-td" id="view_us_identifier"><?php echo $us->usIdentifier; ?></td>
    </tr>
    <tr>
        <th>Summary:</th>
        <td class="table-td" id="view_us_summary"><?php echo $us->usSummary; ?></td>
    </tr>
    <tr>
        <th>Priority:</th>
        <td class="table-td" id="view_us_priority"><?php echo $us->usPriority; ?></td>
    </tr>
	<tr>
        <th>Difficulty:</th>
        <td class="table-td" id="view_us_difficulty"><?php echo $us->usDifficulty; ?></td>
    </tr>
	<tr>
        <th>State:</th>
        <td class="table-td" id="view_us_state"><?php echo $us->usState; ?></td>
    </tr>
	<tr>
        <th>Duration:</th>
        <td class="table-td" id="view_us_duration"><?php echo $us->usDuration; ?></td>
    </tr>
	<tr>
        <th>Description:</th>
        <td class="table-td" id="view_us_description"><?php echo $us->usDescription; ?></td>
    </tr>
</table>

<h3>Sprints</h3>
<ul>
	<?php foreach ($sprints as $sprint) { ?>
		<li>
			<a href="?sprints&amp;id=<?php echo $sprint->sprintId; ?>" target="_blank">
				<?php echo $sprint->sprintIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>

<h3>Tasks</h3>
<ul>
	<?php foreach ($tasks as $task) { ?>
		<li>
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>