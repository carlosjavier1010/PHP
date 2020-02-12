<?php

    require_once '../Model/UsuarioDB.php';

    class Usuario{
        private $usuario;
        private $pass;
        
        public function __construct($usuario,$pass)
        {
            $this->usuario = $usuario;
            $this->pass = $pass;
        }

        public function insert()
    {   
        $usuario = $this->usuario;
        $pass = $this->pass;

        //Encriptación del pass del usuario
        $pass = password_hash($pass,PASSWORD_BCRYPT,['cost=>1']);
        $conexion = UsuarioDB::connectDB();
        // Comprueba si ya existe un usuario con el CORREO o NOMBRE USUARIO proporcionado
        $consulta = $conexion->query('SELECT usuario FROM usuarios WHERE usuario="'.$usuario.'"');
        var_dump($consulta);
        if ($consulta != false && $consulta->rowCount() > 0) {
?>
            Ya existe un usuario con el siguiente CORREO o NOMBRE DE USUARIO: <?= $usuario ?><br>
            Por favor, introduzca otro nombre usuario o correo <a href="../Controller/registro.php">Registro</a>.

<?php
        } else {
            $insercion = "INSERT INTO usuarios (usuario, pass) VALUES ('$usuario','$pass')";
            //echo $insercion;
            $conexion->exec($insercion);
            header('Location:../Controller/index.php');
        }
    }
    public function update()
    {
        $conexion = UsuarioDB::connectDB();
        $pass = password_hash($this->pass,PASSWORD_BCRYPT,['cost=>1']);
        $insercion = "UPDATE usuarios SET pass=\"$pass\" WHERE usuario=\"$this->usuario\"";
        //echo $insercion;
        $conexion->exec($insercion);
    }
    public function delete()
    {

        $conexion = UsuarioDB::connectDB();

        $insercion = "DELETE FROM usuarios WHERE usuario=\"$this->usuario\"";
        //echo $insercion;
        $conexion->exec($insercion);
    }
    //Comprobar el nombre de usuario y la contraseña para el login
    public function comprobar(){
         $conexion = UsuarioDB::connectDB();
         $usuario = $this->usuario;
         
         // Comprueba si ya existe un usuario con el CORREO o NOMBRE USUARIO proporcionado
         $consulta = $conexion->query("SELECT usuario,pass FROM usuarios WHERE usuario='$usuario'");
         var_dump($consulta);
         if ($consulta != false && $consulta->rowCount() > 0) {
                $con = $consulta->fetchObject();
                $pass = $con->pass;
                
                
                if (password_verify($this->pass,$pass)) {
                    //echo '<br>igual';
                    return true;
                }else {
                    //echo '<br>distinto : '.$this->pass." bbdd: ".$pass;
                    return false;
                }
            
            
        }else {
            return false;
        }
    }
    //Comprobar el nombre de usuario para el registro
    public function comprobarUsuario(){
        $conexion = UsuarioDB::connectDB();
        $usuario = $this->usuario;
        // Comprueba si ya existe un usuario con el CORREO o NOMBRE USUARIO proporcionado
        $consulta = $conexion->query("SELECT usuario FROM usuarios WHERE usuario='$usuario'");
        var_dump($consulta);
        if ($consulta != false && $consulta->rowCount() > 0) {
          //echo 'existe';
           return false;
       }else {
           //echo 'no existe';
           return true;
       }
   }
    }
?>