
<form method="post" action="?sprints">
    <label>Identifier:</label><input type="text" name="new_sprint_identifier" required /><br />
    <label>Duration:</label><input type="text" name="new_sprint_duration" required /><br />
    <label>description:</label><br /><textarea name="new_sprint_description"></textarea><br />
    <input type="submit" value="Add sprint">
</form>

<br />
<a href="?sprints"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
