<?php
    include_once('./TerminalDisplayer.php');
    class PausingTerminalDisplayer extends TerminalDisplayer{
        public function iterationControl(){
            usleep(5*10000);
        }
    }
?>