<?php $task = $context->getData(); ?>

<form method="post" action="?task">
    <input type="hidden" name="edit_task_id" value="<?php echo $task->taskId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_task_identifier"
                                value="<?php echo $task->taskIdentifier; ?>" required /><br />
    <label>Description:</label><input type="text" name="edit_task_summary"
                                    value="<?php echo $task->taskSummary; ?>" required /><br />
    <label>Expected duration:</label><input type="text" name="edit_task_expected_duration"
                                        value="<?php echo $task->taskExpectedDuration; ?>" /><br />
    <label>Description:</label><br /><textarea name="edit_task_description">
                                        <?php echo $task->taskDescription; ?>
                                     </textarea>
    <input type="submit" value="Edit task">
</form>
