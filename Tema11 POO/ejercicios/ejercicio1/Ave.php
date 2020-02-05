<?php
    require_once 'Animal.php';
    class Ave extends Animal{
        private $pluma;

        public function __construct($s)
        {
            parent::__construct($s);
            $this->pluma = true;
        }
        public function getPluma()
        {
                return $this->pluma;
        }
    }
?>