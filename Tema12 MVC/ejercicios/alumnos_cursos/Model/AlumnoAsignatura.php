<?php
    require_once '../Model/AlumnoDB.php';

    class AlumnoAsignatura{
        private $matricula;
        private $codigoAsignatura;
        
        public function __construct($matricula,$codigoAsignatura)
        {
            $this->matricula = $matricula;
            $this->codigoAsignatura = $codigoAsignatura;
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
         * Get the value of codigoAsignatura
         */ 
        public function getCodigoAsignatura()
        {
                return $this->codigoAsignatura;
        }

        /**
         * Set the value of codigoAsignatura
         *
         * @return  self
         */ 
        public function setCodigoAsignatura($codigoAsignatura)
        {
                $this->codigoAsignatura = $codigoAsignatura;

                return $this;
        }
        public function insert() {
            $conexion = AlumnoDB::connectDB();
            $insercion = "INSERT INTO alumnoasignatura (matricula, codigo) VALUES (\"".$this->matricula."\",$this->codigoAsignatura)";
            $conexion->exec($insercion);
        }
        public function delete()
    {

        $conexion = AlumnoDB::connectDB();
        $matricula = $this->matricula;
        $codigo = $this->codigoAsignatura;
        $delete = "DELETE FROM alumnoasignatura WHERE matricula='$matricula' AND codigo='$codigo'";
        //echo $insercion;
        $conexion->exec($delete);
    }
        public function deleteAlumno() {
		$conexion = AlumnoDB::connectDB();
		$borrado = "DELETE FROM alumnoasignatura WHERE matricula=\"".$this->matricula."\"";
		$conexion->exec($borrado);
    }
    public function deleteAsignatura() {
		$conexion = AlumnoDB::connectDB();
		$borrado = "DELETE FROM alumnoasignatura WHERE codigo=\"".$this->codigoAsignatura."\"";
		$conexion->exec($borrado);
	}
        public static function asignaturasByAlumno($matricula){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT codigo FROM alumnoasignatura WHERE matricula='$matricula'");
           if ($consulta->rowCount()>0) {
            while ($con = $consulta->fetchObject()) {
                $asignaturas[] = Asignatura::getAsignaturaById($con->codigo);
            }
            return $asignaturas;
           }else {
               return 0;
           }
           
                
            
        }
        public static function AlumnosByAsignatura($codigo){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT matricula FROM alumnoasignatura WHERE codigo='$codigo'");
           if ($consulta->rowCount()>0) {
            while ($con = $consulta->fetchObject()) {
                $alumnos[] = Alumno::getAlumnoById($con->matricula);
            }
            return $alumnos;
           }else {
               return 0;
           }
           
                
            
        }
        public static function asignaturasLibres($matricula){
            $conexion = AlumnoDB::connectDB();
            $consulta = $conexion->query("SELECT codigo FROM asignatura WHERE codigo NOT IN(select codigo FROM alumnoasignatura WHERE matricula='$matricula')");
           if ($consulta->rowCount()>0) {
            while ($con = $consulta->fetchObject()) {
                $asignaturas[] = Asignatura::getAsignaturaById($con->codigo);
            }
            return $asignaturas;
           }else {
               return 0;
           } 
        }
    }
