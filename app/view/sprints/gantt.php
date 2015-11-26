<?php $data = $context->getData(); ?>

<table class="table-list view">
    <tr>
        <th>Developers / Duration:</th>
		<?php foreach($data['duration'] as $duration){ ?>
        <td class="table-td" ><?php echo $duration; ?></td>
		<?php } ?>
    </tr>
	
	<?php foreach($data['developers'] as $developer){ ?>
    <tr>
	<?php foreach($developer as $dev_task){ ?>
        <td class="table-td" ><?php echo $dev_task; ?></td>
	<?php } ?>
    </tr>
	<?php } ?>


</table>


