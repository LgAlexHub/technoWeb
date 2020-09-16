<?php

    class Simulator {
        private $worldStateInstance;
        private $interfaceInstance;
        private $displayerIterfaceInstance;

        public function __construct($worldStateInstance, $interfaceInstance, $displayerIterfaceInstance)
        {   
            $this->worldStateInstance = $worldStateInstance;
            $this->interfaceInstance = $interfaceInstance;
            $this->displayerIterfaceInstance = $displayerIterfaceInstance;
        }

        public function displayEvolution($nb=50){
            for ($i = 0 ; $i < $nb ; $i++){
                $this->worldStateInstance = $this->worldStateInstance->compute_next_generation($this->interfaceInstance);
		    	usleep(350000);
            		}
        }

        
        
    }

    /*
    public function createRule($num){
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
    */
?>