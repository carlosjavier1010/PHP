<?php

    class Zona{
         private $zona;
         private $entradas;
         private $libres;   

         public function __construct($zona,$entradas)
         {
             $this->zona = $zona;
             $this->entrada = $entradas;
             $this->libres = $entradas;
         }

         

         /**
          * Get the value of zona
          */ 
         public function getZona()
         {
                  return $this->zona;
         }

         /**
          * Set the value of zona
          *
          * @return  self
          */ 
         public function setZona($zona)
         {
                  $this->zona = $zona;

                  return $this;
         }

         /**
          * Get the value of entradas
          */ 
         public function getEntradas()
         {
                  return $this->entradas;
         }

         /**
          * Set the value of entradas
          *
          * @return  self
          */ 
         public function setEntradas($entradas)
         {
                  $this->entradas = $entradas;

                  return $this;
         }

         /**
          * Get the value of libres
          */ 
         public function getLibres()
         {
                  return $this->libres;
         }

         /**
          * Set the value of libres
          *
          * @return  self
          */ 
         public function setLibres($libres)
         {
                  $this->libres = $libres;

                  return $this;
         }

         public function vender($entradas){
            if ($this->libres >= $entradas) {
                $this->libres-=$entradas;
                return true;
            }else {
                return false;
            }
         }
         public function __toString()
         {
               return  "Zona:".$this->zona." Aforo:".$this->entrada." Libres:".$this->libres;     
         }
    }
?>