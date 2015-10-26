<?php $sprint = $context->getData(); ?>

<form method="post" action="?sprints">
    <input type="hidden" name="edit_sprint_id" value="<?php echo $sprint->sprintId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_sprint_identifier"
                                value="<?php echo $sprint->sprintIdentifier; ?>" required /><br />
    <label>Duration:</label><input type="text" name="edit_sprint_duration"
                                    value="<?php echo $sprint->sprintDuration; ?>" required /><br />
		
    <label>Description:</label><br /><textarea name="edit_sprint_description">
                                        <?php echo $sprint->sprintDescription; ?>
                                     </textarea><br />
    <input type="submit" value="Edit sprint">
</form>

<br />
<a href="?sprints"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
