<div class="add-block">
    <a href="?developers&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add developer</button></a>
    <button id="help" class="btn btn-link">
    <img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button>
</div>

<?php if (!empty($context->getData())) { ?>
<table class="table-list">
    <tr>
        <th class="table-th">Name</th>
        <th class="table-th">First name</th>
    </tr>

<?php
    foreach ($context->getData() as $dev) {
?>
    <tr>
        <td class="table-td"><?php echo $dev->devName; ?></td>
        <td class="table-td">
            <?php echo $dev->devFirstName; ?>
            <a class="icon" href="?developers&amp;del=<?php echo $dev->devId; ?>"><img src="<?php echo $context::DEL_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?developers&amp;edit=<?php echo $dev->devId; ?>"><img src="<?php echo $context::EDIT_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?developers&amp;manage=<?php echo $dev->devId; ?>"><img  src="<?php echo $context::MANAGE_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?developers&amp;id=<?php echo $dev->devId; ?>"><img src="<?php echo $context::VIEW_BUTTON_IMG; ?>" /></a>
        </td>
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

<div id="description" title="Developers / Développeurs">
    <p>
        <i><b>English</b></i><br />

        My tailor is rich !
    </p>
    <p>
        <i><b>Français</b></i><br />
        Les développeurs sont au coeur de la méthode. Ils sont donc indispensables
        au bon déroulement du travail. Il faudra évidemment bien les entretenir,
        leur donner à manger, à boire (surtout du café), et veiller à ce qu'ils
        dorment au moins 6h/jour.<br />
        Un bon chef de projet saura repérer très vite quels développeurs sont
        capables de dormir moins (sous menaces, ou promesses), et pourra alors
        profiter de ceux-là plus que des autres.<br />
        Afin d'éviter de fatiguer les développeurs, il sera nécessaire de leur
        donner quelques jours de vacances par an, mais en essayant de chercher le
        nombre de jours maximum qui leur convient (encore une fois, certains tiennent
        le coup plus que d'autres, donc il faut surveiller).<br />
        En cas de mutineries importantes chez les développeurs, il ne faut pas hésiter
        à utiliser les grands moyens, car ils ne faut pas qu'ils oublient qui les payent !
        En menaçant de baisser les doses de café, ainsi que de downgrader leurs ordinateurs
        (déjà qu'ils rament, la plupart du temps), il sera simple de les mater.<br />
        Pour rajouter un développeur à un projet, jetez une Dev Ball en cliquant sur "Add developer",
        puis entrez le nom et prénom de votre développeur, ainsi qu'une petite description si
        besoin (son niveau, par exemple). Si votre Dev Ball est assez puissante, votre développeur
        sera ajouté en cliquant sur "Add". Voilà, vous avez capturé un nouveau développeur,
        faites-en bon usage ! <br />
        <i>Note : les développeur sauvages (i.e. indépendants) sont plus facile
        à capturer que ceux d'une autre team (i.e. la concurrence).</i>
    </p>
</div>

