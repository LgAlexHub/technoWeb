<?php
	include_once('./EvolutionRule.php');
	class Rule0to255 implements EvolutionRule{
		private $arrayRule; 
		public function __construct($num){
			$this->arrayRule = $this->getRule0To255($num);
		}
		
		public function computeNextStateCell($leftAlive,$selfAlive,$rightAlive){
			$bin = bindec($leftAlive).bindec($selfAlive).bindec($rightAlive);
			return $this->arrayRule[strval($bin)];
			
		}
		  
		public function getRule0To255($num){
			if ($num > 0 && $num < 256){
				$bin = str_split(sprintf('%08b',$num),1);
				$array=array();
				for ($i = 0 ; $i < sizeof($bin) ; $i++){
					$array[sprintf('%03b', $i)] = $bin[$i];
				}
				return $array;
			}else{
				return null;
			}
			
		}
	  }

?>



