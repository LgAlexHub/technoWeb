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
                $tmp->cells[$i]=(rand(0,10)<2);
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
            echo "\n";
        }


    }

    $myWorld = WorldState::buildFixedWorld(100);
    $myWorld->__toString();
?>