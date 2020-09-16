<?php 
    include_once('./Displayer.php');
    class StatDisplayer implements Displayer{
        public function displayWorld(WorldState $worldStateInstance){
            echo "[Âge] -> ".$worldStateInstance->__getAge();
            $wolrdCells = $worldStateInstance->__getCells();
            $whiteCounter=0;
            for ($i = 0 ; $i < sizeof($wolrdCells); $i++ ){
                if ($wolrdCells[$i] == true)
                    $whiteCounter++;
            }
            echo "[Black cells] ->".(sizeof($wolrdCells)-$whiteCounter)." [White cells] -> ".$whiteCounter."\n";
        }
    }
?>