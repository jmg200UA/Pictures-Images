<?php	

	
	$aleatorio=rand(0,3);
	$iterator=0;

	echo $aleatorio."<br>";

	$fichero= fopen("datos.txt", "r");

	while(!feof($fichero)){
		$linea=fgets($fichero);
		echo $linea. "<br/>";
		if($iterator==$aleatorio){
			echo "<strong>".$linea."</strong>";
		}
		$iterator++;
	}

	fclose($fichero);


?>