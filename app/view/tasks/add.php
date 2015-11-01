
<form class="form-signin add" method="post" action="?tasks">
    <label >Identifier:</label><input  type="text" name="new_task_identifier" required />
    <label >Summary:</label><input  type="text" name="new_task_summary" required />
    <label >Expected duration:</label><input  type="number" name="new_task_expected_duration" />
    <label >Description:</label><textarea name="new_task_description"></textarea>
    <button  class="btn btn-lg" type="submit">Add</button>
</form>
