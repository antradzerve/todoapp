<?php 

class SumController {
    public function sum($a, $b) {
        return $a+$b;
    }
}

$controller = new SumController();

if (isset($_REQUEST['_method'])) {
    switch($_REQUEST['_method'])
    {
        case 'sum':
            $val1 = $_REQUEST['a'];
            $val2 = $_REQUEST['b'];
            $sum = $controller->sum($val1, $val2);
            echo $sum;
            break;
        default:
            echo 'sumtin wong';
    }
}

?>