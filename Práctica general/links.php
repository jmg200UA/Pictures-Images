<?php
	$link = @mysqli_connect(
	            'localhost', // El servidor
	            'root', // El usuario
	            '', // La contraseña
	            'pibd'); // La base de datos
	
	if(!$link) {
	    echo '<p>Error al conectar con la base de datos: ' . mysqli_connect_error();
	    echo '</p>';
	    exit;
	}
?>