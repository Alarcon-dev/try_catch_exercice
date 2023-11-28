<?php 

function divide(int $numerator , $divide){

    try {
        if($divide == 0){
            throw new Exception('Error: no se puede dividir por cero');
        }
        $result = $numerator / $divide;
        return $result;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

echo divide(8,0);