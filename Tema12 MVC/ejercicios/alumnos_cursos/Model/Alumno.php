<?php

    require_once '../Model/AlumnoDB.php';

    class Alumno{
        private $matricula;
        private $nombre;
        private $apellidos;
        private $curso;

        public function __construct($matricula,$nombre,$apellidos,$curso)
        {
            $this->matricula = $matricula;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->curso = $curso;
        }

        

        /**
         * Get the value of matricula
         */ 
        public function getMatricula()
        {
                return $this->matricula;
        }

        /**
         * Set the value of matricula
         *
         * @return  self
         */ 
        public function setMatricula($matricula)
        {
                $this->matricula = $matricula;

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

        /**
         * Get the value of apellidos
         */ 
        public function getApellidos()
        {
                return $this->apellidos;
        }

        /**
         * Set the value of apellidos
         *
         * @return  self
         */ 
        public function setApellidos($apellidos)
        {
                $this->apellidos = $apellidos;

                return $this;
        }

        /**
         * Get the value of curso
         */ 
        public function getCurso()
        {
                return $this->curso;
        }

        /**
         * Set the value of curso
         *
         * @return  self
         */ 
        public function setCurso($curso)
        {
                $this->curso = $curso;
                return $this;
        }
        public function insert()
    {   
        $matricula = $this->matricula;
        $nombre = $this->nombre;
        $apellidos = $this->apellidos;
        $curso = $this->curso;

        $conexion = AlumnoDB::connectDB();
        // Comprueba si ya existe alumno con la MATRICULA INTRODUCIDA
        $consulta = $conexion->query('SELECT matricula FROM alumno WHERE matricula="'.$matricula.'"');
        var_dump($consulta);
        if ($consulta != false && $consulta->rowCount() > 0) {
?>
            Ya existe un alumno con esa matricula <?= $matricula ?><br>
            Por favor, vuelva a la <a href="../Controller/index.php">Pagina principal</a>.

<?php
        } else {
            $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES ('$matricula','$nombre','$apellidos','$curso')";
            //echo $insercion;
            $conexion->exec($insercion);
            header('Location:../Controller/index.php');
        }
    }
    public function update()
    {
        $conexion = AlumnoDB::connectDB();

        $insercion = "UPDATE alumno SET nombre=\"$this->nombre\", apellidos=\"$this->apellidos\", curso=\"$this->curso\" WHERE matricula=\"$this->matricula\"";
        //echo $insercion;
        $conexion->exec($insercion);
    }
    public function delete()
    {

        $conexion = AlumnoDB::connectDB();

        $insercion = "DELETE FROM alumno WHERE matricula=\"$this->matricula\"";
        //echo $insercion;
        $conexion->exec($insercion);
    }
    public static function getAlumnos(){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT matricula, nombre, apellidos, curso FROM alumno ORDER BY apellidos");
            if ($consulta->rowCount()>0) {
            while ($con = $consulta->fetchObject()) {
                $alumnos[] = new Alumno($con->matricula, $con->nombre, $con->apellidos, $con->curso);
            }
            return $alumnos;
        }else {
                return 0;
        }
            
    }
    public static function getAlumnoById($matricula){
        $conexion = AlumnoDB::connectDB();
        $consulta = $conexion->query("SELECT matricula, nombre, apellidos, curso FROM alumno WHERE matricula='$matricula'");

        $con = $consulta->fetchObject();
        $alumno = new Alumno($con->matricula,$con->nombre,$con->apellidos,$con->curso);
        
        return $alumno;
    }
    
    }
?>