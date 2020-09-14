<?php 
    class WorldState{
        private $cells = [];

        public function __construct($nbCells=100)
        {
            $this->cells = array_fill(0,$nbCells,false);
        }

        public static function buildFixedWorld($nbCells,$ratio){
            $tmp = new WorldState($nbCells);
            for ($i  = 0 ; $i < $nbCells ; $i++){
                $tmp->cells[$i]=((rand(0,100)/100))<$ratio;
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

        public function compute_next_state_rule110($leftAlive,$selfAlive,$rightAlive){
            $res=false;
            if ($leftAlive == true && $selfAlive == true && $rightAlive == true){
                $res = true;
            }elseif ($leftAlive == false && $selfAlive == false && $rightAlive == false){
                $res = true;
            }elseif ($leftAlive == false && $selfAlive == true && $rightAlive == true){
                $res = true;
            }
            return $res;
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
        public function compute_next_generation ($compute_next_state){
        
            for ($i = 0 ; $i < sizeof($this->cells);$i++){
                if ($i == 0){
                    $left = 99;
                }else{
                    $left = (($i-1)%100);
                }
                $right = (($i+1)%100);
                $this->cells[$i] = $this->{$compute_next_state}($this->cells[$left],$this->cells[$i],$this->cells[$right]);
            }
            $trash=null;
            system("clear",$trash);
	    $this->__toString();
	    echo "\n";
            return $this;
        }

        

    }

    class Simulator{
        private $worldStateInstance;

        public function __construct($worldStateInstance)
        {   
            $this->worldStateInstance = $worldStateInstance;
        }

        public function displayEvolution($nb,$rules){
            for ($i = 0 ; $i < $nb ; $i++){
                $this->worldStateInstance = $this->worldStateInstance->compute_next_generation($rules);
		    	usleep(350000);
            		}
        }
        
        
    }

    function createRule($num){
        if ($num < 254 && $num > -1){
            $num = sprintf('%08d',decbin($num));
        }
        $array_bin = array();
        for ($i = 7 ; $i >=0 ; $i--){
            array_push($array_bin,sprintf('%03d',decbin($i)));
        }
        
        $res = function (){
            
        };
    }
    
   
   
    if (sizeof($argv) == 4){
	$myWorld = WorldState::buildFixedWorld($argv[2],$argv[1]);
    $mySimulator = new Simulator($myWorld);
	$mySimulator->displayEvolution($argv[3],'compute_next_state_rule184');
    }else{
	$myWorld = WorldState::buildFixedWorld(100,0.2);
    $mySimulator = new Simulator($myWorld);
    createRule(110);
    //$mySimulator->displayEvolution(10,'compute_next_state_rule110');
    }
    

?>
