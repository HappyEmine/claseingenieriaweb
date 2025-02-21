<?php
    $options = array(
        'location' => 'http://localhost/webservices/appwebservices/server.php',
        'uri'      => 'http://localhost/webservices/appwebservices'
    );
    
    $client = new SoapClient(NULL, $options);
    
    $nombre = "Usuario";
    $num1 = 10;
    $num2 = 5;


    echo $client->saludar($nombre . '!!!') . "</br>";
    echo "El Resultado de la suma es: " . $client->operacion($num1,$num2,'+') . "</br>";  
    echo "El Resultado de la resta es: " . $client->operacion($num1,$num2,'-') . "</br>";
    echo "El Resultado de la multiplicacion es: " . $client->operacion($num1,$num2,'*') . "</br>";
    echo "El Resultado de la division es: " . $client->operacion($num1,$num2,'/') . "</br>";
?>



