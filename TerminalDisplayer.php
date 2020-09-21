<?php 
    include_once('./Displayer.php');
    abstract class TerminalDisplayer implements Displayer{
        private $livingPixel;
        private $deadPixel;

        public function __construct($livingPixel,$deadPixel){
            $this->livingPixel = $livingPixel;
            $this->deadPixel = $deadPixel;
        }
        public function displayWorld(WorldState $worldStateInstance){
			echo "<PRE>";
            $cellsArray = $worldStateInstance->__getCells();
            for ($i = 0 ; $i < sizeof($cellsArray); $i++){
                if ($cellsArray[$i] == true){
                    echo $this->livingPixel;
                }else{
                    echo $this->deadPixel;
                }
            } 
            $this->iterationControl();
            echo "\n";
            echo "</PRE>";
        }

        public abstract function iterationControl();
    }

?>
