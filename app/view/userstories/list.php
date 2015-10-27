<div class="add-block">
    <a href="?userstories&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add user_story</button></a>
    <button id="help" class="btn btn-link"><img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button>
</div><br />

<?php if (!empty($context->getData())) { ?>
<table class="table-list">
    <tr>
        <th class="table-th">Identifier</th>
        <th class="table-th">Summary</th>
    </tr>

<?php
    foreach ($context->getData() as $us) {
?>
    <tr>
        <td class="table-td"><?php echo $us->usIdentifier; ?></td>
        <td class="table-td">
            <a href="?userstories&amp;id=<?php echo $us->usId ?>">
                <?php echo $us->usSummary; ?>
            </a>
        </td>
        <td class="table-td">
            <a href="?userstories&amp;edit=<?php echo $us->usId; ?>"><img src="<?php echo $context::EDIT_BUTTON_IMG; ?>" /></a>
            <a href="?userstories&amp;del=<?php echo $us->usId; ?>"><img src="<?php echo $context::DEL_BUTTON_IMG; ?>" /></a>
        </td>
    </tr>
<?php
    }
}
?>
</table>

<br />
<a href="?"><img src="<?php echo $context::BACK_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Back</button></a><br />

<div id="description" title="User stories">
    <p>
        <i><b>English</b></i><br />

    </p>
    <p>
        <i><b>Français</b></i><br />
       
    </p>
</div>

<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
<script src="assets/js/jquery-add.js"></script>

<script>
    $(function() {

        $('#description').dialog({
            autoOpen: false,
            width: 640,
            height: 480
        });

        $('#help').on('click', function() {
            $('#description').dialog('open');
        });
    });
</script>
