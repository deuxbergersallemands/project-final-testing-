<?php $data = $context->getData(); ?>

<table class="table-list view" >
    <tr>
        <th >Identifier:</th>
        <td  class="table-td" id="view_task_identifier"><?php echo $data['task']->taskIdentifier; ?></td>
    </tr>
    <tr>
        <th >Summary:</th>
        <td  class="table-td" id="view_task_summary"><?php echo $data['task']->taskSummary; ?></td>
    </tr>
    <tr>
        <th >Expected duration:</th>
        <td  class="table-td" id="view_task_expected_duration"><?php echo $data['task']->taskExpectedDuration; ?></td>
    </tr>
    <tr>
        <th >Real duration:</th>
        <td  class="table-td" id="view_task_duration"><?php echo $data['task']->taskDuration; ?></td>
    </tr>
    <tr>
        <th >State:</th>
        <td class="table-td" id="view_task_state"><?php echo $data['task']->taskState; ?></td>
    </tr>
    <tr>
        <th >Description:</th>
        <td  class="table-td" id="view_task_description"><?php echo $data['task']->taskDescription; ?></td>
    </tr>
</table>

<h3> Commits related to this Task </h3>
<?php 
    echo "<table><tr><th>Commit</th><th>User</th><th>Sha</th></tr>";
    foreach ($commits as $commit) { 
        if (strstr($commit->getCommit()->getMessage(),$data['task']->taskIdentifier, true) > 1)
          echo "<tr><td>".$commit->getCommit()->getMessage()."</td><td>".$commit->getAuthor()->getLogin()."</td><td>".$commit->getSha()."</td></tr>";
    }
    echo "</table>";
 ?>

<h3>Userstories</h3>
<ul>
	<?php foreach ($data['ussTask'] as $us) { ?>
		<li>
			<a href="?userstories&amp;id=<?php echo $us->usId; ?>" target="_blank">
				<?php echo $us->usIdentifier; ?>
			</a>
		</li>
	<?php } ?>
</ul>

<h3>Developer</h3>
<?php if (!empty($data['devTask'])) { ?>
    <a href="?developers&amp;id=<?php echo $data['devTask']->devId; ?>" target="_blank">
        <?php echo $data['devTask']->devFirstName[0]; ?>. <?php echo $data['devTask']->devName; ?>
	</a>
<?php } ?>