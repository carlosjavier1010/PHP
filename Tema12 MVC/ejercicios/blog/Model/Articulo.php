<?php
    require_once 'BlogDB.php';

    class Articulo{
        private $id;
        private $titulo;
        private $fecha;
        private $contenido;

        public function __construct($id,$titulo,$fecha,$contenido)
        {
            $this->id = $id;
            $this->titulo = $titulo;
            $this->fecha = $fecha;
            $this->contenido = $contenido;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

        /**
         * Get the value of fecha
         */ 
        public function getFecha()
        {
                return $this->fecha;
        }

        /**
         * Set the value of fecha
         *
         * @return  self
         */ 
        public function setFecha($fecha)
        {
                $this->fecha = $fecha;

                return $this;
        }

        /**
         * Get the value of contenido
         */ 
        public function getContenido()
        {
                return $this->contenido;
        }

        /**
         * Set the value of contenido
         *
         * @return  self
         */ 
        public function setContenido($contenido)
        {
                $this->contenido = $contenido;

                return $this;
        }

        public function insert() {
            $conexion = BlogDB::connectDB();
            $insercion = "INSERT INTO articulos (titulo, fecha, contenido) VALUES (\"".$this->titulo."\", \"".$this->fecha."\", \"".$this->contenido."\")";
            $conexion->exec($insercion);
          }
        
        public function delete() {
            $conexion = BlogDB::connectDB();
            $borrado = "DELETE FROM articulos WHERE id=\"".$this->id."\"";
            $conexion->exec($borrado);
        }
        public static function getArticulos(){
            $conexion = BlogDB::connectDB();
            $seleccion = "SELECT id, titulo, fecha, contenido FROM articulos ORDER BY fecha desc";
            $consulta = $conexion->query($seleccion);
            
            $articulos = [];
            
            while ($registro = $consulta->fetchObject()) {
              $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
            }
            
            return $articulos;      
        }
    }
?>