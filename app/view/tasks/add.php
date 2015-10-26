
<form class="form-signin add" method="post" action="?tasks">
    <label >Identifier:</label><input  type="text" name="new_task_identifier" required /><br />
    <label >Summary:</label><input  type="text" name="new_task_summary" required /><br />
    <label >Expected duration:</label><input  type="text" name="new_task_expected_duration" /><br />
    <label >Description:</label><br /><textarea name="new_task_description"></textarea><br />
    <button   onclick="window.location.href = '?tasks';" class="btn btn-lg "  >Cancel </button>
    <button  class="btn btn-lg " type="submit"  >Add task </button>
</form>

