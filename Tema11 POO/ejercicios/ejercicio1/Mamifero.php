<?php
    require_once 'Animal.php';
    
    class Mamifero extends Animal{

        private $mama;

        public function __construct($s)
        {
            parent::__construct($s);
            $this->mama = true;
        }
        
        public function getMama()
        {
                return $this->mama;
        }
      
    }
?>