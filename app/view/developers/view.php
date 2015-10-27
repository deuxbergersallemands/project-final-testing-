<?php $dev = $context->getData(); ?>

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
