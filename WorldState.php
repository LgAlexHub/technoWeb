<?php 
    include_once('./Rule110.php');
    class WorldState{
        private $cells;
        private $age ;

        public function __construct($nbCells=100)
        {
            $this->age = 0;
            $this->cells = array_fill(0,$nbCells,false);
        }

        public static function buildFixedWorld($nbCells,$ratio=0.2){
            $tmp = new WorldState($nbCells);
            for ($i  = 0 ; $i < $nbCells ; $i++){
                $tmp->cells[$i]=((rand(0,100)/100))<$ratio;
            }
            return $tmp;
        }


        public function __getAge(){
            return $this->age;
        }

        public function __upAge(){
            $this->age++;
        }

        public function __getCells(){
            return $this->cells;
        }

        public function isCellAliveAtPosition($position){
            return ($position < sizeof($this->cells && $this->cells[$position])==true);
        }

        public function __toString()
        {
            echo "Âge : (".$this->age.")";
            for ($i = 0 ; $i < sizeof($this->cells);$i++){
                if ($this->cells[$i]==true){
                    echo "W";
                }else{
                    echo "B";
                }
            }
            
        }

        public function compute_next_state_rule184($left,$self,$right){
            $res=false;
                if ($left == true && $self ==true && $right ==true){
                    $res=true;
                }elseif($left==true && $self == false && $right==true){
                    $res=true;
                }elseif($left==true && $self == false && $right == false){
                    $res=true;
                }elseif($left==false && $self == true && $right == true){
                    $res=true;
                }
            return $res;
        }

	// $compute_next_state doit être appelé sous forme de chaîne 
        public function compute_next_generation (EvolutionRule $interfaceInstance){
            for ($i = 0 ; $i < sizeof($this->cells);$i++){
                if ($i == 0){
                    $left = 99;
                }else{
                    $left = (($i-1)%100);
                }
                $right = (($i+1)%100);
                $this->cells[$i] = $interfaceInstance->computeNextStateCell($this->cells[$left],$this->cells[$i],$this->cells[$right]);
                //$this->cells[$i] = $this->{$compute_next_state}($this->cells[$left],$this->cells[$i],$this->cells[$right]);
            }       
            $this->__upAge();
            return $this;
        }

        

    }
?>
