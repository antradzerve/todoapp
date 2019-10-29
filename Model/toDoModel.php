<?php class ToDoItem{
    public $id;
    public $task;

    public function __construct(
        $id,
        $task
    )
    {
        $this->id = $id;
        $this->task = $task;
    }
}

?>