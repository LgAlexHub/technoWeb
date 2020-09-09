<?php 
	/* condition pour qu'une case soit blanche 
	 * 
    	 *si elle et ses voisines étaient toutes trois blanches
    	 *si elle et ses voisines étaient toutes trois noires
    	 *si sa voisine de gauche était noire, mais elle-même et sa voisine de droite étaient blanches 
	*/ 
	function build_world(){
		$res = [];
		for ($i = 0 ; $i < 100 ; $i ++){
			if (rand(0,10) <= 1 ){
				$res[$i] = ' ';
			}else{
				$res[$i] = '#';
			}
		}
		return $res;
	}

	function print_world($world){
		for ($i = 0 ; $i < sizeof($world);$i++){
			echo $world[$i]; 
		}
		echo "\n";
	}

	function compute_next_state_rule110($left, $self , $right ) {
		$res; 
		if ($left == '#' && $self == '#' && $right == '#'){
			$res = '#';
		}elseif($left == ' ' && $self ==' ' && $right == ' '){
			$res = '#';
		}elseif($left == ' ' && $self == '#' && $right == '#'){
			$res = '#';
		}else{
			$res =' ';
		}
		return $res;
	}
	
	function next_generation($world){
		for ($i = 0 ; $i < sizeof($world) ; $i++){
			if ($i == 0 ){
				$left = 99;
			}else{
				$left = (($i-1)%100);
			}	
			$right = (($i+1)%100);
			$world[$i] = compute_next_state_rule110($world[$left],$world[($i%100)],$world[$right]);
		}
		return $world;
	}

	function display_evolution($world, $nb_generations){
		$var_retour; // useless 
		for ($i = 0 ; $i < $nb_generations ; $i++){
			system("clear",$var_retour);
			print_world($world);
			$world = next_generation($world);
			usleep(100000);
		}
	}

	display_evolution(build_world(),50);

?>
