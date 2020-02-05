<?php
    class Menu{
        private $titulo;
        private $enlace;
        public function __construct()
        {
            $this->titulo = array();
            $this->enlace = array();
        }

        public function anadir($titulo,$enlace){
            $this->titulo[] = $titulo;
            $this->enlace[] = $enlace;
        }

        public  function vertical(){
            echo '<table class="table">
            <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Enlace</th>
            </tr>
          </thead><tbody>';
            for ($i=0; $i < count($this->titulo) ; $i++) { 
                echo '
                <tr>
                <td>'.$this->titulo[$i].'</td>
                <td>'.$this->enlace[$i].'</td>
                </tr>';
            }
            

            echo '</tbody>
            </table>';
        }
        public  function horizontal(){
            echo '<table class="table">
            <thead>
            <tr>
              <th scope="col">Titulo</th>
              <th scope="col">Enlace</th>
            </tr>
          </thead><tbody><tr>  ';
            for ($i=0; $i < count($this->titulo) ; $i++) { 
                echo '
                
                <td>'.$this->titulo[$i].'</td>
                <td>'.$this->enlace[$i].'</td>';
            }
            

            echo '</tr></tbody>
            </table>';
        }
    }
?>