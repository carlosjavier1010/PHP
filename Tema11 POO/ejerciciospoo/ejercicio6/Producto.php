<?php
class Producto
{

    private $codigo;
    private $nombre;
    private $precio;
    private $stock;
    public static $productos = array();
    
    public function __construct($codigo, $nombre, $precio, $stock)
    {
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function reponer($cantidad)
    {
        $this->stock += $cantidad;
    }
    public function vender($cantidad, $enCesta)
    {
        $total =  $cantidad - $enCesta;
        if ($total >= 0) {
            $this->stock -= $enCesta;
            $this->setStock($this->stock);
            return true;
        } else {
            return false;
        }
        
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

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }
    public static function getProductos()
    {

        // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $consulta = $conexion->query("SELECT id, nombre, precio, stock FROM productos");

        while ($con = $consulta->fetchObject()) {
            self::$productos[] = new Producto($con->id, $con->nombre, $con->precio, $con->stock);
        }

        return self::$productos;
    }

    //Le pasamos un objeto en la llamada static y la metemos en la BBDD
    public static function setProductos($producto)
    {
        $nombread = $producto->getNombre();
        $precioad = $producto->getPrecio();
        $stockad = $producto->getStock();
       
        // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        // Comprueba si ya existe un cliente con el DNI introducido
        $consulta = $conexion->query('SELECT nombre FROM productos WHERE nombre=".$nombread.');
        var_dump($consulta);    
        if ($consulta != false && $consulta->rowCount() > 0) {
?>          
            Ya existe un cliente con nombre <?= $nombread ?><br>
            Por favor, vuelva a la <a href="altaClienteFormulario.php">página de alta de clien\
                te</a>.
            
<?php
        } else {
            $insercion = "INSERT INTO productos (id, nombre, precio, stock) VALUES ('','$nombread','$precioad','$stockad')";
            //echo $insercion;
            $conexion->exec($insercion);
            
            
        }
    }
        public static function modProducto($codigo,$nombre,$precio,$stock){
             // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        $insercion = "UPDATE productos SET nombre=\"$nombre\", precio=\"$precio\", stock=\"$stock\" WHERE id=\"$codigo\"";
            //echo $insercion;
            $conexion->exec($insercion);

        }

        public static function getProducto($id){
            $encontrado = false;
             // Conexión a la base de datos
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        $consulta = $conexion->query("SELECT id, nombre, precio, stock FROM productos");

        while ($con = $consulta->fetchObject()) {
           if ($con->id == $id) {
               $productoId = new Producto($con->id,$con->nombre,$con->precio,$con->stock);
               $encontrado = true;
           }
        }
        if ($encontrado) {
            return $productoId;
        } else {
            return $encontrado;
        }
        
        

        }

        /**
         * Get the value of stock
         */ 
        public function getStock()
        {
                return $this->stock;
        }

        /**
         * Set the value of stock
         *
         * @return  self
         */ 
        public function setStock($stock)
        {
                
                $codigo = $this->codigo;
                try {
                    $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
                } catch (PDOException $e) {
                    echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                    die("Error: " . $e->getMessage());
                }
                
                $insercion = "UPDATE productos SET stock=\"$stock\" WHERE
                id=\"$codigo\"";
                //echo $insercion;
                $conexion->exec($insercion);

        }
        public static function delete($codigo){
            
            try {
                $conexion = new PDO("mysql:host=localhost;dbname=tiendapoo;charset=utf8", "root", "");
            } catch (PDOException $e) {
                echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
                die("Error: " . $e->getMessage());
            }

            $insercion = "DELETE FROM productos WHERE id=\"$codigo\"";
            //echo $insercion;
            $conexion->exec($insercion);
        }
      
        
}
?>