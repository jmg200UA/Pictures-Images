<?php
$data = file_get_contents("consejos.json");
$products = json_decode($data, true);

$aleatorio=rand(0,4);
	$iterator=0;
 
echo $products[$aleatorio]["categoria"]."<br>";
echo $products[$aleatorio]["dificultad"]."<br>";
echo $products[$aleatorio]["descripcion"]."<br>";
?>