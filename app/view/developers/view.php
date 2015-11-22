<?php $data = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Name:</th>
        <td class="table-td" name="view_dev_name"><?php echo $data['dev']->devName; ?></td>
    </tr>
    <tr>
        <th>First name:</th>
        <td class="table-td" name="view_dev_first_name"><?php echo $data['dev']->devFirstName; ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td class="table-td" name="view_dev_description"><?php echo $data['dev']->devDescription; ?></td>
    </tr>
</table>

<h3>Tasks</h3>
<ul>
	<?php foreach ($data['tasksDev'] as $task) { ?>
		<li>
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>

