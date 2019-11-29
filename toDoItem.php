<li class="list-group-item d-flex justify-content-between align-items-center"> 
    <input id="<?php echo $taskItem->id ?>" placeholder="<?php echo $taskItem->task ?>" value="<?php echo $taskItem->task ?>" disabled>
    <?php echo $taskItem->id ?>
    <div>
        <form action="Controller/toDoController.php" method="post">
            <input type="hidden" name="_method" value="update">
            <button type="button" onclick="enableEditing(<?php echo $taskItem->id ?>)" class="btn btn-success mx-1">Edit</button>
        </form>
        <!-- <form>
            <input type="hidden" name="_method" value="update">
            <input type="hidden" name="id" value="<?php echo $taskItem->id ?>">
            <input type="hidden" name="task" value="">
            <button type="submit" class="btn btn-danger mx-1">Save edits</button>
        </form> -->
        <form action="Controller/toDoController.php" method="post">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?php echo $taskItem->id ?>">
            <button type="submit" class="btn btn-warning mx-1">Delete</button>
        </form>
    </div>
</li>

<script>

function enableEditing(id) {
    document.getElementById(id).removeAttribute("disabled");
}

</script>