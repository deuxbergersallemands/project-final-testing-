<div class="add-block">
    <a href="?sprints&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add sprint</button></a>
    <button id="help" class="btn btn-link"><img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button>
</div>

<?php if (!empty($context->getData())) { ?>
<table class="table-list">
    <tr>
        <th class="table-th">Identifier</th>
        <th class="table-th">Duration</th>
    </tr>

<?php
    foreach ($context->getData() as $sprint) {
?>
    <tr>
        <td class="table-td"><?php echo $sprint->sprintIdentifier; ?></td>
        <td class="table-td">
            <?php echo $sprint->sprintDuration; ?>
            <a class="icon" name="DEL" href="?sprints&amp;del=<?php echo $sprint->sprintId; ?>"><img src="<?php echo $context::DEL_BUTTON_IMG; ?>" /></a>
            <a class="icon" name="EDIT" href="?sprints&amp;edit=<?php echo $sprint->sprintId; ?>"><img src="<?php echo $context::EDIT_BUTTON_IMG; ?>" /></a>
            <a class="icon" name="MANAGE" href="?sprints&amp;manage=<?php echo $sprint->sprintId; ?>"><img  src="<?php echo $context::MANAGE_BUTTON_IMG; ?>" /></a>
            <a class="icon" name="VIEW" href="?sprints&amp;id=<?php echo $sprint->sprintId; ?>"><img src="<?php echo $context::VIEW_BUTTON_IMG; ?>" /></a>
    </tr>
<?php
    }
}
?>
</table>

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

<div id="description" title="Sprints">
    <p>
        <i><b>English</b></i><br />

    </p>
    <p>
        <i><b>Français</b></i><br />
        Les sprints sont les sessions pendant lesquels les développeurs accomplissent les
        tâches.<br />
        Et au vu du nom, ils ont intérêt à se bouger le cul. Franchement, une autre dénomination
        aurait été plus adéquate, parce que "sprint", personnellement, cela me fait peur. Je pense
        directement à "rapidité, codage à l'arrache, etc...". On ne peut pas dire que les inventeurs
        de la méthode étaient inspirés.
    </p>
</div>