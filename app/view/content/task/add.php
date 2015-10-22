
<form method="post" action="?task">
    <label>Identifier:</label><input type="text" name="new_task_identifier" required /><br />
    <label>Summary:</label><input type="text" name="new_task_summary" required /><br />
    <label>Expected duration:</label><input type="text" name="new_task_expected_duration" /><br />
    <label>Description:</label><br /><textarea name="new_task_description"></textarea><br />
    <input type="submit" value="Add task">
</form>
