<?php
include ("Controller/toDoController.php");
$controller = new TaskController();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>To do to do to do to do to </title>
</head>

<body>

    <div class="container">
        <div class="d-flex flex-column text-center">
            <h1 class="mt-3">Todo List</h1>
            <form class="d-flex flex-row my-3">
                <input class="form-control" type="text" placeholder="Add vital tasks">
                <button type="button" class="btn btn-info">Submit</button>
            </form>

        </div>
        <ul class="list-group">
            <?php
            $taskList = $controller->getAll();
            foreach ($taskList as $taskItem) {
                include('toDoItem.php');
            }
            
            ?>
        </ul>
    </div>
    </div>

    <!-- <div id="sum_test">
        <form action="Controller/sum.php" method="POST">
            <input type="hidden" name="_method" value="sum">
            <input type="number" name="a">
            <input type="number" name="b">
            <button></button>
        </form>
    </div> -->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</body>

</html>