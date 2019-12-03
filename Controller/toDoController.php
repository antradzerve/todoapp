<?php 

include_once $_SERVER["DOCUMENT_ROOT"] . "/Model/toDoModel.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/Services/ToDoRepository.php";

use Repository\ToDoRepository;

class TaskController{

    public function insert($task) {
        $rep = new ToDoRepository();
        $toDoItem = new ToDoItem();
        $toDoItem->task = $task;
        $rep->save($toDoItem);
        header('Location: /');
    }
    
    public function getAll() {
        $rep = new ToDoRepository();
        $taskList = $rep->findAll();
        return $taskList;
    }

    public function delete($id) {
        $rep = new ToDoRepository();
        $toDoItem = $rep->find($id);
        $rep->delete($toDoItem);
        header('Location: /');
    }

    public function update($id, $task) {
        $rep = new ToDoRepository();
        $toDoItem = $rep->find($id);
        $toDoItem->task = $task;
        $rep->update($toDoItem);
        header('Location: /');
    }
}

// echo '???';
// var_dump($_REQUEST);

$controller = new TaskController();

if (isset($_REQUEST['_method'])) {
    switch($_REQUEST['_method'])
    {
        case 'save':
            if (isset($_REQUEST['task'])) {
                $task = $_REQUEST['task'];
                $controller->insert($task);
            }
            break;
        case 'delete':
            if(isset($_REQUEST['id'])){
                $id = $_REQUEST['id'];
                    $controller->delete($id);
            }
            break;
        case 'update':
            var_dump($_REQUEST);
            if(isset($_REQUEST['test']) && isset($_REQUEST['id'])){
                $task = $_REQUEST['test'];
                $id = $_REQUEST['id'];
                $controller->update($id, $task);
            }
            break;
        default:
            echo 'sumtin wong';
    }
}

?>