<?php 

include_once "Model/toDoModel.php";
include_once "Services/ToDoRepository.php";

use Repository\ToDoRepository;

class TaskController{

    public function getAll() {
        $rep = new ToDoRepository();
        $taskList = $rep->findAll();
        return $taskList;
    }

}

$controller = new TaskController();

// if (isset($_REQUEST['_method'])) {
//     switch($_REQUEST['_method'])
//     {
//         case 'post':
//             $controller->PostRequest();
//             break;
//         case 'delete':
//             if(isset($_REQUEST['products'])){
//                 $skuForDeletion = $_REQUEST['products'];
//                 foreach ($skuForDeletion as $sku){
//                     $controller->delete($sku);
//                 }
//             }
//             break;
//         default:
//             echo 'sumtin wong';
//     }
// }

?>