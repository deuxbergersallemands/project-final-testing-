
<form method="post" action="?userstories">
    <label>Identifier:</label><input type="text" name="new_us_identifier" required /><br />
    <label>Summary:</label><input type="text" name="new_us_summary" required /><br />
    <label>Priority:</label><br /><input type="number" name="new_us_priority"><br />
    <label>Difficulty:</label><br /><input type="number" name="new_us_difficulty"><br />
    <label>description:</label><br /><textarea name="new_us_description"></textarea><br />
    <input type="submit" value="Add user_story">
</form>

<br />
<a href="?userstories"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
