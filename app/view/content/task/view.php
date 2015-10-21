<?php $task = $context->getData(); ?>

<table>
    <tr>
        <th>Identifier:</th>
        <td><?php echo $task->taskIdentifier; ?></td>
    </tr>
    <tr>
        <th>Description:</th>
        <td><?php echo $task->taskDescription; ?></td>
    </tr>
    <tr>
        <th>Expected duration:</th>
        <td><?php echo $task->taskExpectedDuration; ?></td>
    </tr>
    <tr>
        <th>Real duration:</th>
        <td><?php echo $task->taskDuration; ?></td>
    </tr>
    <tr>
        <th>State:</th>
        <td><?php echo $task->taskState; ?></td>
    </tr>
    <tr>
        <th>Comment:</th>
        <td><?php echo $task->taskComment; ?></td>
    </tr>
</table>
