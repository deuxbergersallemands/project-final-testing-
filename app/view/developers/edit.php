<?php $dev = $context->getData(); ?>

<form class="form-signin add" method="post" action="?developers">
    <input type="hidden" name="edit_dev_id" value="<?php echo $dev->devId; ?>" />
    <label>Name:</label><input type="text" name="edit_dev_name"
                                value="<?php echo $dev->devName; ?>" required />
    <label>First name:</label><input type="text" name="edit_dev_first_name"
                                    value="<?php echo $dev->devFirstName; ?>" required />
    <label>Description:</label><textarea name="edit_dev_description"><?php echo $dev->devDescription; ?></textarea>
    <input type="submit" value="Edit developer">
</form>
