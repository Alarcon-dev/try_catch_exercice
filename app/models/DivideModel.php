<?php 

class DivideModel{
    private int $num_1; 
    private int $num_2;

    public function getNum_1()
    {
        return $this->num_1;
    }

    
    public function setNum_1($num_1)
    {
        $this->num_1 = $num_1;

        return $this;
    }

     
    public function getNum_2()
    {
        return $this->num_2;
    }

    
    public function setNum_2($num_2)
    {
        $this->num_2 = $num_2;

        return $this;
    }

    public function generateDivision(){
        $result =  $this->getNum_1() / $this->getNum_2();

        return $result;

    }
}