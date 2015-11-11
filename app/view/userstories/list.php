<div class="add-block">
    <a href="?userstories&amp;add"><img src="<?php echo $context::ADD_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">Add user story</button></a>
    <button id="help" class="btn btn-link"><img src="<?php echo $context::HELP_BUTTON_IMG; ?>" /></button><br>
    <a href="?userstories&amp;BDC"><img src="<?php echo $context::VIEW_BUTTON_IMG; ?>" /><button type="button" class="btn btn-link">View Burndown Chart</button></a>
   
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
          	<a class="icon" href="?userstories&amp;manage=<?php echo $us->usId; ?>"><img  src="<?php echo $context::MANAGE_BUTTON_IMG; ?>" /></a>
            <a class="icon" href="?userstories&amp;id=<?php echo $us->usId; ?>"><img src="<?php echo $context::VIEW_BUTTON_IMG; ?>" /></a>
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

<div id="description" title="User stories">
    <p>
        <i><b>English</b></i><br />
        Backlog is a user story list. A user story is a sort of scenario to
        express easily what we expect from a project. In general case, a
        user story is written as follows: <br />
        
        As a &lt; role &gt;, I want &lt; goal / desire &gt; so that &lt; benefit &gt; <br />
        <u>For example:</u> As a developer, I want the website to make coffee. <br />
        The last part is not really mandatory. <br />
        
        Each user story has priority and difficulty. The first is given by just one person,
        called the "product owner". In general, it is the customer. The second is evaluated
        by each person in the team, and must belongs to a modified Fibonacci number. Identifier
        is used to quickly express a user story. <br />
        
        Here, you can handle user stories. To add a user story, just click on 'Add' (too easy, isn't it ?)
        and fill the fields. Just identifier and summary are required, but comments are always welcome.
        When a new user story is added,
        it appears in the list (or backlog), and you can edit it, delete it, or just see its description.
        In description, you will find all the fields that you filled previously, plus the associated tasks
        and sprints. There are also user stories dependencies. <br />
        Edition is like addition, it's the same form, but already filled by previously given
        data. Identifier and summary are still required. <br />
        You can also manage a user story, that is to say, affect user story to sprints, affect tasks
        to user story, and manage dependencies between user stories. <br />
        
        Burn Down Chart is used for showing advanced work. It evolves over sprints. x-axis is for
        sprints, and y-axis is for cumulative difficulty. It permits to predict work end.
    </p>
    <p>
        <i><b>Français</b></i><br />
       
    </p>
</div>
