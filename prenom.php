<?php 	

function csvParser ($maxRow,$pathFile){
	$handle = fopen($pathFile,"r");
	$res = [];
	$i = 0 ;
	echo "<-- Start parsing --> \n";
	while (($row = fgetcsv($handle,1000,","))!=FALSE && $i < $maxRow){
		array_push($res, $row);
		$i++;
	}
	return $res;
}	

function csvObjectExploder($csvTab){
	$stringTab = ["sexe","prenom","annee","departement","nombre"];
	for ($i = 0 ; $i < sizeof($csvTab) ;$i++){
		$tmp = explode(";",$csvTab[$i][0]);
		print_r($tmp);
		$csvTab[$i][0] = [];
		for ($j = 0 ; $j < sizeof($tmp) ; $j++){
			$csvTab[$i][0] = array_merge($csvTab[$i][0],[$stringTab[$j]=>$tmp[$j]]);
		}
	}
	return $csvTab;
}
	$csv_tab = csvParser(100,"dpt2018.csv");
	$csv_tab = csvObjectExploder($csv_tab);
	print_r($csv_tab);
		
?>
