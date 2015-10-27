
<form class="form-signin add" method="post" action="?userstories">
    <label>Identifier:</label><input type="text" name="new_us_identifier" required />
    <label>Summary:</label><input type="text" name="new_us_summary" required />
    <label>Priority:</label><input type="number" name="new_us_priority">
    <label>Difficulty:</label><input type="number" name="new_us_difficulty">
    <label>description:</label><textarea name="new_us_description"></textarea>
    <button  class="btn btn-lg" type="submit">Add</button>
</form>
