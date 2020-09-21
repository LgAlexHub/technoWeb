<?php 
    interface EvolutionRule{
        public function computeNextStateCell($leftAlive,$selfAlive,$rightAlive);
    }
?>