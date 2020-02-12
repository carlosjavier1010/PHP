<?php

    require_once '../Model/AlumnoDB.php';

class Asignatura{

    private $codigo;
    private $nombre;

    public function __construct($codigo=0,$nombre)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
    }

        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }
        public function insert() {
            $conexion = AlumnoDB::connectDB();
            $insercion = "INSERT INTO asignatura (codigo,nombre) VALUES (0,\"".$this->nombre."\")";
            $conexion->exec($insercion);
        }
        public function delete(){
            $conexion = AlumnoDB::connectDB();

            $insercion = "DELETE FROM asignatura WHERE codigo=\"$this->codigo\"";
            //echo $insercion;
            $conexion->exec($insercion);
        }
        public static function getAsignaturas(){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT codigo, nombre FROM asignatura");
            if ($consulta->rowCount()>0) {
            while ($con = $consulta->fetchObject()) {
                $asignaturas[] = new Asignatura($con->codigo, $con->nombre);
            }
            return $asignaturas;
        }else {
            return 0;
        }
            
        }
        public static function getAsignaturaById($codigo){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT codigo, nombre FROM asignatura WHERE codigo='$codigo'");

            $con = $consulta->fetchObject();
            $asignatura = new Asignatura($con->codigo,$con->nombre);
            return $asignatura;
        }
}

?>