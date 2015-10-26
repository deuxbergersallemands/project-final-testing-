
<form method="post" action="?developers">
    <label>Name:</label><input type="text" name="new_dev_name" required /><br />
    <label>First name:</label><input type="text" name="new_dev_first_name" required /><br />
    <label>Description:</label><br /><textarea name="new_dev_description"></textarea><br />
    <input type="submit" value="Add developer">
</form>

<br />
<a href="?developers"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />
