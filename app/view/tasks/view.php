<?php $task = $context->getData(); ?>

<table class="table-list view" >
    <tr>
        <th >Identifier:</th>
        <td  class="table-td"><?php echo $task->taskIdentifier; ?></td>
    </tr>
    <tr>
        <th >Summary:</th>
        <td  class="table-td"><?php echo $task->taskSummary; ?></td>
    </tr>
    <tr>
        <th >Expected duration:</th>
        <td  class="table-td"><?php echo $task->taskExpectedDuration; ?></td>
    </tr>
    <tr>
        <th >Real duration:</th>
        <td  class="table-td"><?php echo $task->taskDuration; ?></td>
    </tr>
    <tr>
        <th >State:</th>
        <td class="table-td"><?php echo $task->taskState; ?></td>
    </tr>
    <tr>
        <th >Description:</th>
        <td  class="table-td"><?php echo $task->taskDescription; ?></td>
    </tr>
</table>

<br />
    <button  class="btn btn-lg add" onclick="window.location.href = '?tasks';"  > Back</button>
