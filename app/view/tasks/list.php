
<a href="?tasks&amp;add">Add new task</a><br />

<table>
    <tr>
        <th>Identifier</th>
        <th>Summary</th>
        <th>Expected duration</th>
    </tr>

<?php
foreach ($context->getData() as $task) {
?>
    <tr>
        <td><?php echo $task->taskIdentifier; ?></td>
        <td>
            <a href="?tasks&amp;id=<?php echo $task->taskId ?>">
                <?php echo $task->taskSummary; ?>
            </a>
        </td>
        <td><?php echo $task->taskExpectedDuration; ?></td>
        <td><a href="?tasks&amp;edit=<?php echo $task->taskId; ?>">Edit</a></td>
        <td><a href="?tasks&amp;del=<?php echo $task->taskId; ?>">Delete</a></td>
    </tr>
<?php
}
?>

</table>
