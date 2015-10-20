
<form method="post" action="?task">
    <input type="hidden" name="edit_task_id" value="<?php echo $task->taskId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_task_identifier"
                                value="<?php echo $task->taskIdentifier; ?>" required />
    <label>Description:</label><input type="text" name="edit_task_description"
                                    value="<?php echo $task->taskDescription; ?>" required />
    <label>Expected duration:</label><input type="text" name="edit_task_expected_duration"
                                        value="<?php echo $task->taskExpectedDuration; ?>" />
    <input type="submit" value="Edit task">
</form>
