<?php $dev = $context->getData(); ?>

<table>
    <tr>
        <th>Name:</th>
        <td><?php echo $dev->devName; ?></td>
    </tr>
    <tr>
        <th>First name:</th>
        <td><?php echo $dev->devFirstName; ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td><?php echo $dev->devDescription; ?></td>
    </tr>
</table>

<br />
<a href="?developers"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
