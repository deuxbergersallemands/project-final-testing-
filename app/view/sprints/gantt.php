<?php
$data = $context->getData();
$devs = $data['devs'];
$maxWorkLoad = $data['maxWorkLoad'];
?>

<div class="mleft">
    <table class="table">
        <tr>
            <td>Developer</td>
        <?php for ($i = 0 ; $i < $maxWorkLoad ; $i++) { ?>
            <td><?php echo $i + 1; ?></td>
        <?php } ?>
        </tr>
        <?php foreach ($devs as $dev) { ?>
            <tr>
                <th>
                    <a href="?developers&amp;id=<?php echo $dev['dev']->devId; ?>" target="_blank">
                        <?php echo $dev['dev']->devName; ?>
                    </a>
                </th>
                <?php foreach ($dev['tasks'] as $task) { ?>
                    <td colspan="<?php echo $task['duration']; ?>" bgcolor="CCCCCC">
                        <a href="?tasks&amp;id=<?php echo $task['task']->taskId; ?>" target="_blank">
                            <?php echo $task['task']->taskIdentifier; ?>
                        </a>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</div>


