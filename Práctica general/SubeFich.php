<?php
session_start();  
?>

<!DOCTYPE html>
<html lang="es">
	<head>
	<?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Página principal</title>
	</head>
	<body>
		<header>
			<!--LOGOTIPO -->
			<?php
			include("enlaceprincipal.php");
            ?>
        </header>
        <form action="RecogeFich.php" method="post" enctype="multipart/form-data">
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Foto:</p>
            <p><input type="file" name="perfil"></p>
            <p><input type="submit" name="Enviar"></p>
    </body>
</html>