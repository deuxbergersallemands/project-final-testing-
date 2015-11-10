<?php $data = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Identifier:</th>
        <td class="table-td" id="view_us_identifier"><?php echo $data['us']->usIdentifier; ?></td>
    </tr>
    <tr>
        <th>Summary:</th>
        <td class="table-td" id="view_us_summary"><?php echo $data['us']->usSummary; ?></td>
    </tr>
    <tr>
        <th>Priority:</th>
        <td class="table-td" id="view_us_priority"><?php echo $data['us']->usPriority; ?></td>
    </tr>
	<tr>
        <th>Difficulty:</th>
        <td class="table-td" id="view_us_difficulty"><?php echo $data['us']->usDifficulty; ?></td>
    </tr>
	<tr>
        <th>State:</th>
        <td class="table-td" id="view_us_state"><?php echo $data['us']->usState; ?></td>
    </tr>
	<tr>
        <th>Duration:</th>
        <td class="table-td" id="view_us_duration"><?php echo $data['us']->usDuration; ?></td>
    </tr>
	<tr>
        <th>Description:</th>
        <td class="table-td" id="view_us_description"><?php echo $data['us']->usDescription; ?></td>
    </tr>
</table>

<h3>Sprints</h3>
<ul>
	<?php foreach ($data['sprints'] as $sprint) { ?>
		<li>
			<a href="?sprints&amp;id=<?php echo $sprint->sprintId; ?>" target="_blank">
				<?php echo $sprint->sprintIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>

<h3>Tasks</h3>
<ul>
	<?php foreach ($data['tasks'] as $task) { ?>
		<li>
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>