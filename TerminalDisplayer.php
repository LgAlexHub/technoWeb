<?php 
    include_once('./Displayer.php');
    class TerminalDisplayer implements Displayer{
        public function displayWorld(WorldState $worldStateInstance){
            $cellsArray = $worldStateInstance->__getCells();
            for ($i = 0 ; $i < sizeof($cellsArray); $i++){
                
            } 
        }
    }

?>