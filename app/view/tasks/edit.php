<?php $task = $context->getData(); ?>

<form class="form-signin add" method="post" action="?tasks">
    <input type="hidden" name="edit_task_id" value="<?php echo $task->taskId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_task_identifier"
                                value="<?php echo $task->taskIdentifier; ?>" required />
    <label>Description:</label><input type="text" name="edit_task_summary"
                                    value="<?php echo $task->taskSummary; ?>" required />
    <label>Expected duration:</label><input type="number" name="edit_task_expected_duration"
                                        value="<?php echo $task->taskExpectedDuration; ?>" />
    <label>Description:</label><textarea name="edit_task_description"><?php echo $task->taskDescription; ?></textarea>
    <div>
    	<label >ToDo</label><input type="radio" name="edit_task_state" value="todo" required>
    	<label >Ongoing </label><input type="radio" name="edit_task_state" value="inProg">
    	<label >Done </label><input type="radio" name="edit_task_state" value="ongoing">
    </div>
    <button  class="btn btn-lg" type="submit">Edit</button>
</form>