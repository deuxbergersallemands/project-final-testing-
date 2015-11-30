<?php $data = $context->getData(); ?>

<table class="table table-striped table-list ">

    <tr>
        <th>Identifier:</th>
        <td class="table-td2" id="view_sprint_identifier"><?php echo $data['sprint']->sprintIdentifier; ?></td>
    </tr>
    <tr>
        <th>Duration:</th>
        <td class="table-td2" id="view_sprint_duration"><?php echo $data['sprint']->sprintDuration; ?></td>
    </tr>
  
	<tr>
        <th>Description:</th>
        <td class="table-td2" id="view_sprint_description"><?php echo $data['sprint']->sprintDescription; ?></td>
    </tr>
</table>

<br />
<div class="mleft">

<h2>Kanban</h2>
</div>
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

<br />

<div class="mleft">
<a href="?sprints&amp;pert=<?php echo $data['sprint']->sprintId; ?>">
	<button  class="btn" type="submit">View PERT diagram</button>
</a>

<a href="?sprints&amp;gantt=<?php echo $data['sprint']->sprintId; ?>">
	<button  class="btn" type="submit">View Gantt table</button>
</a>
</div>
