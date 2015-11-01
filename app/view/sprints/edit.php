<?php $sprint = $context->getData(); ?>

<form class="form-signin add" method="post" action="?sprints">
    <input type="hidden" name="edit_sprint_id" value="<?php echo $sprint->sprintId; ?>" />
    <label>Identifier:</label><input type="text" name="edit_sprint_identifier"
                                value="<?php echo $sprint->sprintIdentifier; ?>" required />
    <label>Duration:</label><input type="number" name="edit_sprint_duration"
                                    value="<?php echo $sprint->sprintDuration; ?>" required />
    <label>Description:</label><textarea name="edit_sprint_description"><?php echo $sprint->sprintDescription; ?></textarea>
    <button  class="btn btn-lg" type="submit">Edit</button>
</form>
