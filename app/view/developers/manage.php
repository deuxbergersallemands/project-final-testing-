<?php $data = $context->getData(); ?>

<form class="form-signin" method="post" action="?developers">
	<input type="hidden" name="set_developer_id" value="<?php echo $data['dev']->devId; ?>" />
	
	<label>Tasks</label><br />
	<?php foreach ($data['tasks'] as $task) {  ?>
		<input type="checkbox" value="<?php echo $task->taskId; ?>" name="developer_task_id[]"
			<?php if (in_array($task, $data['tasksDev'])) echo "checked"; ?> >
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?><br />
			</a>
	<?php } ?>
	<br /><br />
    <button  class="btn" type="submit">Edit</button>
</form>