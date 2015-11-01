<div class="add-block">
    <a href="?userstories&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add user story</button></a>
    <button id="help" class="btn btn-link"><img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button>
</div>

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
            <?php echo $us->usSummary; ?>
            <a class="icon" href="?userstories&amp;del=<?php echo $us->usId; ?>"><img src="<?php echo $context::DEL_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?userstories&amp;edit=<?php echo $us->usId; ?>"><img src="<?php echo $context::EDIT_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?userstories&amp;id=<?php echo $us->usId; ?>"><img src="<?php echo $context::VIEW_BUTTON_IMG; ?>" /></a>
        </td>
    </tr>
<?php
    }
}
?>
</table>

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
