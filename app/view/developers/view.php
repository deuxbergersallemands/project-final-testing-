<?php 
 	$data = $context->getData();
	$dev = $data[0];
	$tasks = $data[1];
?>

<table class="table-list view">
    <tr>
        <th>Name:</th>
        <td class="table-td"><?php echo $dev->devName; ?></td>
    </tr>
    <tr>
        <th>First name:</th>
        <td class="table-td"><?php echo $dev->devFirstName; ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td class="table-td"><?php echo $dev->devDescription; ?></td>
    </tr>
</table>

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

