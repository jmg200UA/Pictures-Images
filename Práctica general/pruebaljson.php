<?php

//Leemos el JSON
$datos_clientes = file_get_contents("clientes.json");
$json_clientes = json_decode($datos_clientes, true);

var_dump($json_clientes);

echo $json_clientes[0];

foreach ($json_clientes["algo"] as $cliente) {
    
    echo $cliente."<br>";
}

?>