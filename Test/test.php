<?php

use Repository\ToDoRepository;

require "../Services/ToDoRepository.php";

$items = new ToDoItem();

$items->task = "Do the thing";

$repo = new ToDoRepository();

$repo -> save($items);

$item1 = $repo -> find($items->id);

if($item1->id != $items->id || $item1->task != $items->task) {
    throw new Exception("it ain`t FAMILYAH");
}

$items->task = "Do NOT do the thing";

$repo -> update($items);

$repo -> delete($item1);

$errorcatcher = $repo -> find($item1->id);

if($errorcatcher == true) {
    throw new Exception("stop the h8, m8.");
}

?>