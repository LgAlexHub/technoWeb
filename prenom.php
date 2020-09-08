<?php 	
	$handle = fopen("dpt2018.csv", "r");
	$data =[];
	while(($row = fgetcsv($handle, 1000, ","))!==false){
		array_push($data,$row);
	}	
	var_dump($data);
?>
