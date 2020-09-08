<?php
	for ($i = 1234 ; $i < 5679 ; $i++){
		echo $i ."\n";
	}

	$tab = array();
	for ($i = 0 ; $i < 100 ; $i++){
		array_push($tab,3*$i+2); 
	}

	foreach( $tab as  $element ) {
		echo $element."\n";
	}


	function tab_moy($tab){
		$res = 0 ;
		for ($i = 0 ; $i < sizeof($tab) ; $i++){
			$res+= $tab[$i];
		}
		echo "total : ".$res;
		return $res/sizeof($tab);
	}

	function minimum($tab,$return_key){
		$res = 0 ; 
		$keyR = "";
		foreach($tab as $key => $value){
			if ($res > $value || $res == 0){
				$res = $value;
				$keyR = $key;
			}
		}
		if ($return_key == true){
			return $keyR;
		}else{
			return $res;
		}
	}

	function min_and_max($tab){
		$min = -1 ; $max = -1;
		foreach($tab as $key => $value){
			if ( $value < $min || $min ==-1){
				$min = $value;
			}
			if ( $value > $max || $max ==-1){
				$max = $value;
			}
		}
		return [$min,$max];
	}	


	$res = tab_moy($tab);
	echo $res."\n";

	$persos = [ "Thomas" => 173, "Quentin" => 180, "Alexis" => 183,"Ludovic"=>173];

	foreach( $persos as $key => $element ){
		echo $key." x ".$element." cm\n";
	}

	echo minimum($persos,true)."\n";
	var_dump(min_and_max($persos))."\n";


	asort($tab);
	var_dump($tab);
	arsort($tab);
	var_dump($tab);
	ksort($tab);
	var_dump($var);
	krsort($tab);
	var_dump($var);
	sort($tab);
	var_dump($tab);
	rsort($tab);
	var_dump($tab);
	shuffle($tab);
	var_dump($tab);

?> 
