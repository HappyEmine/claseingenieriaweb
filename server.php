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

