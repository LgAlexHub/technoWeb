<?php 
    include_once('./TerminalDisplayer.php');
    include_once('./WorldState.php');

    class InteractiveTerminalDisplayer extends TerminalDisplayer{
        /*Appelle le constructeur du parent automatiquement
        public function __construct($livingPixel,$deadPixel){
            parent::__construct($livingPixel,$deadPixel);
        }
        */
        public function iterationControl(){
            usleep(3500000000);
            system("clear");
        }


    }
?> 
