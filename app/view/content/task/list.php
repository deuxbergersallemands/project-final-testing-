
<table>
    <tr>
        <th>Identifier</th>
        <th>Description</th>
        <th>Expected duration</th>
    </tr>

<?php
foreach ($context->getData() as $task) {
?>
    <tr>
        <td><?php echo $task->taskIdentifier; ?></td>
        <td>
            <a href="?task&amp;id=<?php echo $task->taskId ?>">
                <?php echo $task->taskDescription; ?>
            </a>
        </td>
        <td><?php echo $task->taskExpectedDuration; ?></td>
    </tr>
<?php
}
?>

</table>
