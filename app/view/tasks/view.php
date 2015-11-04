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
        <td class="table-td">
        	<?php
        		if ($task->taskState == "todo")
        			echo "To Do";
        		
        		else if ($task->taskState == "ongoing")
        			echo "On Going";
        			 
        		else if ($task->taskState == "done")
        			echo "Done";
        	?>
        </td>
    </tr>
    <tr>
        <th >Description:</th>
        <td  class="table-td"><?php echo $task->taskDescription; ?></td>
    </tr>
</table>
