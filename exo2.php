<?php 
	function nomPrenomInput(){
		$name = readline("Prénom svp ...\n");
		$lastName = readline("Nom de famille svp ... \n");
		echo "Enchanté : ".$name." ".$lastName."\n";
		echo "Total chars : ".mb_strlen($name.$lastName)."\n";
		if($name.$lastName == "JeanValjean"){
			echo "Suprise party !!! \n";
		}
	}

	function nameHaveA($input){
		for ($i = 0 ; $i < strlen($input) ; $i++){
			if (strtolower(substr($input,$i,1)) == 'a'){
				echo "Vous avez un a en ".($i+1)." position \n";
				return ;
			}
		}	
		echo "Vous n'avez pas de a dans votre mot \n";
			
		
	}

	function exploser ($input){
		$tabWord = explode($input," ");
		for ($i = 0 ; $i < sizeof($tabWord) ; $i++){
			if ($i == 2){
				return $tabWord[$i];
			}
		}
	}

	function imploser ($tabWord , $charGlue){
		return implode($tabWord,$charGlue);
	}

	function rangeTaPhrase($stringInput){
		$tabWord = explode(" ",strtolower($stringInput));
		do{
			$permut = false; 
			for ($i = 0 ; $i < sizeof($tabWord)-2 ;$i++){
				if (ord($tabWord[$i]) > ord($tabWord[$i+1])){
					$tmp = $tabWord[$i];
					$tabWord[$i] = $tabWord[$i+1];
					$tabWord[$i+1] = $tmp;
					$permut = true;
				}
			}
		}while($permut == true);
		var_dump($tabWord);
		return implode($tabWord," ");; 
	}
	nomPrenomInput();

	nameHaveA("Qauentin");

	echo rangeTaPhrase("Je m'appelle michelle et j'adore le php yeah")."\n";
?>
