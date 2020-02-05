<?php

    if (!isset($_SESSION['idContador'])) {
        $_SESSION['idContador'] = 0;
     }
     require_once 'Vehiculo.php';
     class Bicicleta extends Vehiculo{
        
         
         private $id;
         private $nombre = "";
         private $modelo = "";
         private $color = "";
         public function __construct($kmRecorrido,$nombre,$modelo,$color)
         {  
             $_SESSION['idContador']++;
             $_SESSION['vehiculosCreados']++;
             parent::setKmRecorridos($kmRecorrido);
             $this->modelo = $modelo;
             $this->color = $color;
             $this->nombre = $nombre;
             $this->id = self::getIdContador();
         }
        
         public function andar($km){
             parent::setKmRecorridos($km);
         }
         
         public function quemaRueda(){
             return "<br>Estoy quemando rueda con el coche!<br>";
         }
         public function caballito(){
             return "<br>Estoy haciendo el caballito como Marc Marquez con la bicicleta: ".$this->nombre."<br>";
         }

         /**
          * Get the value of modelo
          */ 
         public function getModelo()
         {
                  return $this->modelo;
         }
         public function setModelo($modelo)
         {
                  $this->modelo = $modelo;

         }
         public function getNombre()
         {
                  return $this->nombre;
         }

         public function setNombre($nombre)
         {
                  $this->nombre = $nombre;
         }
         public function getColor()
         {
                  return $this->color;
         }
         public function setColor($color)
         {
                  $this->color = $color;

         }
         public function getId()
         {
                  return $this->id;
         }
         public function setId($id)
         {
                  $this->id = $id;

                  return $this;
         }
         public static function getIdContador()
         {
                  return $_SESSION['idContador'];
         }
         public static function setIdContador($idContador)
         {
            $_SESSION['idContador'] = $idContador;
         }
     }
?>