<?php 
    include_once('./WorldState.php');
    include_once('./Rule110.php');
    include_once('./Simulator.php');

    $myRule = new Rule110();
    $myWorld = WorldState::buildFixedWorld($argv[1],$argv[2]);
    $mySimulator = new Simulator($myWorld,$myRule);
    $mySimulator->displayEvolution($argv[3]);
?>