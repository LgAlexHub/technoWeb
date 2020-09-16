<?php 
    include_once('./WorldState.php');
    include_once('./Rule110.php');
    include_once('./Simulator.php');
    include_once('./TerminalDisplayer.php');
    include_once('./InteractiveTerminalDisplayer.php');
    include_once('./PausingTerminalDisplayer.php');
    include_once('./AnimatedTerminalDisplayer.php');
    include_once('./StatDisplayer.php');
    $myRule = new Rule110();
    $myWorld = WorldState::buildFixedWorld($argv[1],$argv[2]);
    $myDisplayInter = new StatDisplayer();
    $mySimulator = new Simulator($myWorld,$myRule,$myDisplayInter);
    $mySimulator->displayEvolution($argv[3]);
?>