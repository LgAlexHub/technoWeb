<?php 
    include_once('./WorldState.php');
    include_once('./Rule110.php');
    include_once('./Simulator.php');
    include_once('./TerminalDisplayer.php');
    include_once('./InteractiveTerminalDisplayer.php');
    include_once('./PausingTerminalDisplayer.php');
    include_once('./AnimatedTerminalDisplayer.php');
    include_once('./StatDisplayer.php');
    include_once('./HtmlDisplayer.php');
    include_once('./Rule0to255.php');

    /*
    
   
    
   
    */
	if (substr(php_sapi_name(),0,3) == "cli"){
		$myRule = new Rule0to255($argv[2]);
            $myWorld = WorldState::buildFixedWorld($argv[0],$argv[1]);
            $myDisplayInter = new HtmlDisplayer("▅"," ");
            $mySimulator = new Simulator($myWorld,$myRule,$myDisplayInter);
            $mySimulator->displayEvolution($argv[3]);
	}else{
		  if (isset($_GET) == true){
				if ($_GET['taille'] != null && $_GET['ratio'] != null && $_GET['gen'] != null  && $_GET['rule'] != null){
					$myRule = new Rule0to255($_GET['rule']);
					$myWorld = WorldState::buildFixedWorld($_GET['taille'],$_GET['ratio']);
					$myDisplayInter = new HtmlDisplayer("▅"," ");
					$mySimulator = new Simulator($myWorld,$myRule,$myDisplayInter);
					$mySimulator->displayEvolution($_GET['gen']);
				}
		}
	}
  
?>
