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
                    <?php echo $dev['dev']->devName; ?>
                </th>
                <?php foreach ($dev['tasks'] as $task) { ?>
                    <td colspan="<?php echo $task['duration']; ?>" bgcolor="CCCCCC">
                        <?php echo $task['task']->taskIdentifier; ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</div>


