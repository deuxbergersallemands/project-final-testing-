<div class="add-block">
	
    <a href="?tasks&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add task</button></a>
    <button id="help" class="btn btn-link">
	<img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button>
</div>


<?php if (!empty($context->getData())) { ?>
<table class="table-list">
    <tr>
        <th class="table-th">Identifier</th>
        <th class="table-th">Summary</th>
        <th class="table-th">Expected duration</th>
    </tr>

<?php
    foreach ($context->getData() as $task) {
?>
    <tr >
        <td class="table-td"><?php echo $task->taskIdentifier; ?></td>
        <td class="table-td">
            
                <?php echo $task->taskSummary; ?>
            
        </td>
        <td class="table-td"><?php echo $task->taskExpectedDuration; ?>
		<a class="icone"  href="?tasks&amp;edit=<?php echo $task->taskId; ?>"><img  src="<?php echo $context::EDIT_BUTTON_IMG; ?>" /></a>
        <a class="icone"  href="?tasks&amp;del=<?php echo $task->taskId; ?>"><img src="<?php echo $context::DEL_BUTTON_IMG; ?>" /></a>
        <a class="icone"  href="?tasks&amp;id=<?php echo $task->taskId; ?>"><img src="<?php echo $context::LOUPE_BUTTON_IMG; ?>" /></a>

		</td>
       
    </tr>
<?php
    }
}
?>

</table>

<div id="description" title="Developers / Développeurs">
    <p>
        <i><b>English</b></i><br />
    </p>
    <p>
        <i><b>Français</b></i><br />
        Les tâches représentent le travail qu'il y aura à fournir. Chaque user story est
        divisée en tâches.<br />
        Parmi ces tâches se trouvent : les tests de validation, les tests d'intégration,
        les tests unitaires et les tâches de codage.<br />
        Vous remarquerez quand même qu'il y a plus de tâches concernant les tests, que de
        tâches qui font réellement le taf. C'est à se demander qui a pondu une méthode
        qui se concentre sur tester des trucs qui n'existent pas encore.<br />
        Bref, vous l'aurez sans doute compris, c'est chiant ! Et pas qu'un peu. Bien que
        cela donne un cadre aux projets, c'est lourd.<br />
        Par exemple, pour faire ce (super) site, nous avons dû appliquer cette méthode Scrum,
        et bien je peux vous dire qu'on a souvent retouché les tests d'intégration, tellement
        on oublié de trucs tout le temps. Et voyez le résultat, vous trouvez ça beau ? Ah ben
        ouais, y'a un peu de CSS, mais ça ne fait pas tout non plus.<br />
        Pour ajouter une tâche, cliquer sur "Add task", ensuite indiquez un identifiant, une courte
        description, le temps que vous pensez passer dessus (de toute façon, il sera faux donc ne
        vous cassez pas la tête), et éventuellement une description (sorte de commentaires). Ensuite,
        cliquez sur "Add".
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
