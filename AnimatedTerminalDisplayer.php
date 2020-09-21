<?php 
    include_once('PausingTerminalDisplayer.php');

    class AnimatedTerminalDisplayer extends PausingTerminalDisplayer{
        public function iterationControl(){
            parent::iterationControl();
            echo "\e[2J\e[1;1H";
        }
    }
?>