<?php 
	    include_once('./Displayer.php');
	    class HtmlDisplayer implements Displayer{
			private $livingPixel; 
			private $deadPixel; 
			public function __construct($deadPixel,$livingPixel){
				$this->livingPixel = $livingPixel;
				$this->deadPixel = $deadPixel;
			}
			public function displayWorld(WorldState $worldStateInstance){
				$cellsArray = $worldStateInstance->__getCells();
				for ($i = 0 ; $i < sizeof($cellsArray); $i++){
					if ($cellsArray[$i] == true){
						echo $this->livingPixel;
					}else{
						echo $this->deadPixel;
					}
				}
				echo "<br><hr>";
			}
		}
?>
