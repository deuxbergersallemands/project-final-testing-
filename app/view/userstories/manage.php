<?php $data = $context->getData(); ?>

<form class="form-signin" method="post" action="?userstories">
	<input type="hidden" name="set_us_id" value="<?php echo $data['us']->usId; ?>" />
	
	<label>Tasks</label><br />
	<?php foreach ($data['tasks'] as $task) {  ?>
		<input type="checkbox" name="Tasks_Us[]" value="<?php echo $task->taskId; ?>">
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?><br />
			</a>
	<?php } ?>
	
	<br />
	<label>Sprints</label><br />
	<?php foreach ($data['sprints'] as $sprint) {  ?>
		<input type="checkbox" name="Sprints_Us[]" value="<?php echo $sprint->sprintId; ?>">
			<a href="?sprints&amp;id=<?php echo $sprint->sprintId; ?>" target="_blank">
				<?php echo $sprint->sprintIdentifier; ?><br />
			</a>
	<?php } ?>
	<br /><br />
    <button  class="btn" type="submit">Edit</button>
</form>