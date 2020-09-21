<?php
    include_once('./EvolutionRule.php');
    class Rule110 implements EvolutionRule{
        public function __construct()
        {
            
        }

        public function computeNextStateCell($leftAlive,$selfAlive,$rightAlive){
            $bin = bindec($leftAlive).bindec($selfAlive).bindec($rightAlive);
            $res =false;
            switch ($bin){
                case 110:
                    $res = true;
                break;
                case 101:
                    $res = true;
                break;
                case 011:
                    $res = true;
                break;
                case 010:
                    $res = true;
                break;
                case 001:
                    $res= true;
            }
            return $res;
        }
    }

?>