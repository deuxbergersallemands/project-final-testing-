<?php $data = $context->getData(); ?>

<table class="table table-striped table-list ">
    <tr>
        <th>Name</th>
        <td class="table-td2" name="view_dev_name"><?php echo $data['dev']->devName; ?></td>
    </tr>
    <tr>
        <th>First name</th>
        <td class="table-td2" name="view_dev_first_name"><?php echo $data['dev']->devFirstName; ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td class="table-td2" name="view_dev_description"><?php echo $data['dev']->devDescription; ?></td>
    </tr>
</table>

<!--
<div class="mleft">
<h3>Tasks</h3>
<ul>
	<?php foreach ($data['tasksDev'] as $task) { ?>
		<li>
			<a href="?tasks&amp;id=<?php echo $task->taskId; ?>" target="_blank">
				<?php echo $task->taskIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul> -->
</div>
