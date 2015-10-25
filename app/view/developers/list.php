
<a href="?developers&amp;add">Add developer</a><br />
<table>
    <tr>
        <th>Name</th>
        <th>First name</th>
    </tr>

<?php
foreach ($context->getData() as $dev) {
?>
    <tr>
        <td><?php echo $dev->devName; ?></td>
        <td>
            <a href="?developers&amp;id=<?php echo $dev->devId ?>">
                <?php echo $dev->devFirstName; ?>
            </a>
        </td>
        <td><a href="?developers&amp;edit=<?php echo $dev->devId; ?>">Edit</a></td>
        <td><a href="?developers&amp;del=<?php echo $dev->devId; ?>">Delete</a></td>
    </tr>
<?php
}
?>

</table>
