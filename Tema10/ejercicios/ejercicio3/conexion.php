<?php
   function conexion ($db){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=".$db.";charset=utf8", "root", "");
            
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $e->getMessage());
        }
        return $conexion;
   }
        
?>