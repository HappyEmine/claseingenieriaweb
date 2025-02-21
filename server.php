<?php
    require('conexion.php');
    
    class serverSoap extends Conexion
    {
        public function saludar($name)
        {
            return 'Hola, '.$name.'!';
        }
    
        public function operacion($num1, $num2, $calcular)
        {
           switch($calcular){
            case '+':
                return $num1 + $num2;
            case '-':
                return $num1 - $num2;
            case '*':
                return $num1 * $num2;
            case '/':
                return $num1 / $num2;        
           }
        }
        public function getProduct(){
            $query = "SELECT * FROM producto";
            $result = mysqli_query($this->db, $query);
            while($row = mysqli_fetch_assoc($result))
            {
                return $row['nombre'];
            }
            $result->close();
        }

        public function validarUsuario($usuario, $clave){
            $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND '$clave' = clave  ";
            $result = mysqli_query($this->db, $query); 
            if (mysqli_num_rows($result) > 0) {
                return "Los datos ingresados son válidos";
            } else {
                return "Los datos ingresados no coinciden, intente de nuevo";
            }
        }

    }
    
    // Crear un nuevo servidor SOAP
    $options = array('uri'=>'http://localhost/webservices/appwebservices/');
    
    // Instanciar el servidor SOAP
    $server = new SoapServer(NULL, $options);
    
    // Configurar que clase manejara las solicitudes SOAP
    $server->setClass('serverSoap');
    
    // Procesar las solicitudes SOAP
    $server->handle();
  
?>

