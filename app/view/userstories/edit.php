<?php $us = $context->getData(); ?>

<form method="post" action="?userstories">
    <input type="hidden" name="edit_us_id" value="<?php echo $us->usId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_us_identifier"
                                value="<?php echo $us->usIdentifier; ?>" required /><br />
    <label>Summary:</label><input type="text" name="edit_us_summary"
                                    value="<?php echo $us->usSummary; ?>" required /><br />
	<label>Priority:</label><input type="number" name="edit_us_priority"
                                    value="<?php echo $us->usPriority; ?>"  /><br />								
	
	<label>Difficulty:</label><input type="number" name="edit_us_difficulty"
                                    value="<?php echo $us->usDifficulty; ?>"  /><br />	
    <label>Description:</label><br /><textarea name="edit_dev_description">
                                        <?php echo $us->usDescription; ?>
                                     </textarea><br />
    <input type="submit" value="Edit user_story">
</form>

<br />
<a href="?userstories"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
