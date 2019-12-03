<li class="list-group-item d-flex justify-content-between align-items-center"> 
    <form action="Controller/toDoController.php" method="post">
        <input type="hidden" name="_method" value="update">
        <input id="<?php echo $taskItem->id ?>" placeholder="<?php echo $taskItem->task ?>" value="<?php echo $taskItem->task ?>" onchange="inputChanges(<?php echo $taskItem->id ?>)" disabled>
        <input type="hidden" name="task" value="<?php echo $taskItem->task ?>">
        <input type="hidden" name="id" value="<?php echo $taskItem->id ?>">
        <input type="hidden" name="test" id="test<?php echo $taskItem->id ?>" >
        <button type="submit" class="btn btn-danger mx-1 edit_button" id="button<?php echo $taskItem->id ?>">Save edit</button>
    </form>    
    <div>
        <button type="button" onclick="enableEditing(<?php echo $taskItem->id ?>,'button<?php echo $taskItem->id ?>')" class="btn btn-success mx-1">Edit</button>
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

function enableEditing(id, buttonId) {
    document.getElementById(id).removeAttribute("disabled");
    document.getElementById(buttonId).style.display = "block";
}

function inputChanges(id){
    var e = document.getElementById(id);
    console.log(e.value);
    var t = document.getElementById(`test${id}`);
    t.value = e.value;
}

</script>