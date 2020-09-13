<?php 
    class WorldState{
        private $cells = [];

        public function __construct($nbCells)
        {
            if ($nbCells == null) $nbCells=100;
            $this->cells = array_fill(0,$nbCells,null);
        }

        public static function buildFixedWorld($nbCells){
            $tmp = new WorldState($nbCells);
            for ($i  = 0 ; $i < $nbCells ; $i++){
                $tmp->cells[$i]=(rand(0,10)<1);
            }
            return $tmp;
        }

        public function isCellAliveAtPosition($position){
            return ($position < sizeof($this->cells && $this->cells[$position])==true);
        }

        public function __toString()
        {
            for ($i = 0 ; $i < sizeof($this->cells);$i++){
                if ($this->cells[$i]==true){
                    echo "█";
                }else{
                    echo " ";
                }
            }
            
        }

        public function compute_next_state_rulle110($leftAlive,$selfAlive,$rightAlive){
            $res="";
            if ($leftAlive == true && $selfAlive == true && $rightAlive == true){
                $res = true;
            }elseif ($leftAlive == false && $selfAlive == false && $rightAlive == false){
                $res = true;
            }elseif ($leftAlive == false && $selfAlive == true && $rightAlive == true){
                $res = true;
            }else{
                $res = false;
            }
            return $res;
        }

        public function compute_next_generation (){
        
            for ($i = 0 ; $i < sizeof($this->cells);$i++){
                if ($i == 0){
                    $left = 99;
                }else{
                    $left = (($i-1)%100);
                }
                $right = (($i+1)%100);
                $this->cells[$i] = $this->compute_next_state_rulle110($this->cells[$left],$this->cells[$i],$this->cells[$right]);
            }
            $trash=null;
            system("clear",$trash);
            $this->__toString();
            return $this;
        }

    }

    class Simulator{
        private $worldStateInstance;

        public function __construct($worldStateInstance)
        {   
            $this->worldStateInstance = $worldStateInstance;
        }

        public function displayEvolution($nb){
            for ($i = 0 ; $i < $nb ; $i++){
                $this->worldStateInstance = $this->worldStateInstance->compute_next_generation();
                usleep(350000);
            }
        }
    }

    $myWorld = WorldState::buildFixedWorld(100);
    $mySimulator = new Simulator($myWorld);
    $mySimulator->displayEvolution(50);
?>