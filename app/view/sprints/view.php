<?php $data = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Identifier:</th>
        <td class="table-td"><?php echo $data['sprint']->sprintIdentifier; ?></td>
    </tr>
    <tr>
        <th>Duration:</th>
        <td class="table-td"><?php echo $data['sprint']->sprintDuration; ?></td>
    </tr>
  
	<tr>
        <th>Description:</th>
        <td class="table-td"><?php echo $data['sprint']->sprintDescription; ?></td>
    </tr>
</table>

<a href="?sprints&amp;pert=<?php echo $data['sprint']->sprintId; ?>">View PERT diagram</a>

<br />
<h2>Kanban</h2>

<table class="table-list view">
	<tr>
		<th>Identifier</th>
		<th>To Do</th>
		<th>On Going</th>
		<th>Done</th>
	</tr>
	<?php foreach ($data['tasks'] as $task) {  ?>
	
	<tr>
		<td>
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?>
			</a>
		</td>
		<td 
		    <?php if (empty($task->taskState)
			               || $task->taskState == "todo") echo "bgcolor='red'"; ?>>
		</td>
		<td <?php if ($task->taskState == "ongoing") echo "bgcolor='orange'"; ?> >
		</td>
		<td <?php if ($task->taskState == "done") echo "bgcolor='green'"; ?> >
		</td>
	</tr>
	
	<?php } ?>

</table>
