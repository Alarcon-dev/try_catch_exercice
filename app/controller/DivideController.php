<?php 
require_once "../app/models/DivideModel.php";

class DivideController{
    public function index(){
        require_once __DIR__ . "/../views/divide/divide.php";
    }


    public  function calculate(){
        if($_POST){
            $num_1 = isset($_POST['numero_1']) ? $_POST['numero_1'] : 0;
            $num_2 = isset($_POST['numero_2']) ? $_POST['numero_2'] : 0;

            try {
                if($num_1 != 0 && $num_2 != 0){
                    $divide = new DivideModel;
                    $divide->setNum_1($num_1);
                    $divide->setNum_2($num_2);
                    $result = $divide->generateDivision();

                    require_once __DIR__ . "/../views/divide/result.php";
                }else{
                    throw new Exception("Error: no se puede dividir por cero");
                };

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
    }
}