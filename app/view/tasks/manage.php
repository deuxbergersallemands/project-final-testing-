<?php $data = $context->getData(); ?>

<form class="form-signin" method="post" action="?tasks">
	<input type="hidden" name="set_task_id" value="<?php echo $data['task']->taskId; ?>" />
	
	<label>State</label>
	
	<div>
		<input type="radio" name="set_task_state" value="todo" 
		<?php if ($data['task']->taskState == "todo") echo "checked"; ?>> 
			To Do<br />
		<input type="radio" name="set_task_state" value="ongoing"
		<?php if ($data['task']->taskState == "ongoing") echo "checked"; ?>>
			On Going<br />
		<input type="radio" name="set_task_state" value="done"
		<?php if ($data['task']->taskState == "done") echo "checked"; ?>>
		Done<br />
	</div>
	
	<br />
	<label>Developer</label><br />
	<!-- <input type="radio" name="set_task_developer_id" value=""><br /> -->
	<?php foreach ($data['devs'] as $dev) {  ?>
		<input type="radio" name="set_task_developer_id" value="<?php echo $dev->devId; ?>" 
			<?php if ($data['task']->devId == $dev->devId) echo "checked"; ?> >
			<a href="?developers&amp;id=<?php echo $dev->devId; ?>" target="_blank">
				<?php echo $dev->devFirstName[0]; ?>. <?php echo $dev->devName; ?>
			</a><br />
	
	<?php } ?>
	
	<br />
	<label>Userstories</label><br />
	<?php foreach ($data['us'] as $us) {  ?>
		<input type="checkbox" value="<?php echo $us->usId; ?>" name="userstories_task[]"
		<?php if (in_array($us, $data['usByTask']))  echo "checked"; ?>>
		<a href="?userstories&amp;id=<?php echo $us->usId; ?>" target="_blank">
			<?php echo $us->usIdentifier; ?><br />
		</a>
	<?php } ?>
	<br /><br />
    <button  class="btn" type="submit">Edit</button>
</form>