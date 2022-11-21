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
            <?php
            	if(isset($_SESSION["nombre"])){
            		header("Location: indexlog.php");
            	}
            ?>
			<div id="formuini">
				<fieldset>
					<legend><strong>Formulario de acceso</strong> </legend>
					<form id="clickinicio" action="ControlAcceso.php" method="POST">
						<p><label for="nombre">Nombre de usuario:</label><br>
						<input type="text" name="nombre" id="nombre"></p>
						<p><label for="contraseña">Contraseña:</label><br>
						<input type="password" name="contraseña" id="contraseña"></p>
						<p>
							<input class="ini" type="submit" value="Iniciar Sesion">
						</p>
						<p><input type="checkbox"  id="conditions" name="conditions" value="1">Recordar</p>
					</form>
				</fieldset>
				<div>
					<a class="enlace" href="FormularioUsu.php">Registro</a>
				</div>
			</div>

		</header>
		<h2>Últimas fotos</h2>
		<div id="cajas">
			<?php
				include("links.php");  	
			?>
			<div>
				<img src="imagenes/imagen1.jpg" alt="imagen2">
				<?php
					$sentencia = 'SELECT Titulo,Pais,FRegistro FROM fotos WHERE IdFoto=1';
					if(!($resultado = @mysqli_query($link, $sentencia))) {
						echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
						echo '</p>';
						exit;
					}
                    while($fila = mysqli_fetch_assoc($resultado)) {

                    	switch ($fila['Pais']) {
						    case 1:
						        $npais="España";
						        break;
						    case 2:
						        $npais="Argentina";
						        break;
						    case 3:
						        $npais="Inglaterra";
						        break;
						    case 4:
						        $npais="Francia";
						        break;
						    case 5:
						        $npais="Alemania";
						        break;
						}
						 echo "<p><strong>Titulo:</strong>".$fila['Titulo']."</p>";
						 echo "<p><strong>Fecha:</strong>".$fila['FRegistro']."</p>";
						 echo "<p><strong>Pais:</strong>".$npais."</p>";
                    } 
				?>
			</div>
			<div>
				<img src="imagenes/imagen1.jpg" alt="imagen2">
				<?php
					$sentencia2 = 'SELECT Titulo,Pais,FRegistro FROM fotos WHERE IdFoto=2';
					if(!($resultado2 = @mysqli_query($link, $sentencia2))) {
						echo "<p>Error al ejecutar la sentencia <b>$sentencia2</b>: " . mysqli_error($link);
						echo '</p>';
						exit;
					}
                    while($fila2 = mysqli_fetch_assoc($resultado2)) {
                    	switch ($fila2['Pais']) {
						    case 1:
						        $npais="España";
						        break;
						    case 2:
						        $npais="Argentina";
						        break;
						    case 3:
						        $npais="Inglaterra";
						        break;
						    case 4:
						        $npais="Francia";
						        break;
						    case 5:
						        $npais="Alemania";
						        break;
						}
						 echo "<p><strong>Titulo:</strong>".$fila2['Titulo']."</p>";
						 echo "<p><strong>Fecha:</strong>".$fila2['FRegistro']."</p>";
						 echo "<p><strong>Pais:</strong>".$npais."</p>";
                    } 
				?>
			</div>
			<div>
				<img src="imagenes/imagen1.jpg" alt="imagen2">
				<?php
					$sentencia3 = 'SELECT Titulo,Pais,FRegistro FROM fotos WHERE IdFoto=3';
					if(!($resultado3 = @mysqli_query($link, $sentencia3))) {
						echo "<p>Error al ejecutar la sentencia <b>$sentencia3</b>: " . mysqli_error($link);
						echo '</p>';
						exit;
					}
                    while($fila3 = mysqli_fetch_assoc($resultado3)) {
                    	switch ($fila3['Pais']) {
						    case 1:
						        $npais="España";
						        break;
						    case 2:
						        $npais="Argentina";
						        break;
						    case 3:
						        $npais="Inglaterra";
						        break;
						    case 4:
						        $npais="Francia";
						        break;
						    case 5:
						        $npais="Alemania";
						        break;
						}
						 echo "<p><strong>Titulo:</strong>".$fila3['Titulo']."</p>";
						 echo "<p><strong>Fecha:</strong>".$fila3['FRegistro']."</p>";
						 echo "<p><strong>Pais:</strong>".$npais."</p>";
                    } 
				?>
			</div>
			<div>
				<img src="imagenes/imagen1.jpg" alt="imagen2">
				<?php
					$sentencia4 = 'SELECT Titulo,Pais,FRegistro FROM fotos WHERE IdFoto=4';
					if(!($resultado4 = @mysqli_query($link, $sentencia4))) {
						echo "<p>Error al ejecutar la sentencia <b>$sentencia4</b>: " . mysqli_error($link);
						echo '</p>';
						exit;
					}
                    while($fila4 = mysqli_fetch_assoc($resultado4)) {
                    	switch ($fila4['Pais']) {
						    case 1:
						        $npais="España";
						        break;
						    case 2:
						        $npais="Argentina";
						        break;
						    case 3:
						        $npais="Inglaterra";
						        break;
						    case 4:
						        $npais="Francia";
						        break;
						    case 5:
						        $npais="Alemania";
						        break;
						}
						 echo "<p><strong>Titulo:</strong>".$fila4['Titulo']."</p>";
						 echo "<p><strong>Fecha:</strong>".$fila4['FRegistro']."</p>";
						 echo "<p><strong>Pais:</strong>".$npais."</p>";
                    } 
				?>
			</div>
			<div>
				<img src="imagenes/imagen1.jpg" alt="imagen2">
				<?php
					$sentencia5 = 'SELECT Titulo,Pais,FRegistro FROM fotos WHERE IdFoto=5';
					if(!($resultado5 = @mysqli_query($link, $sentencia5))) {
						echo "<p>Error al ejecutar la sentencia <b>$sentencia5</b>: " . mysqli_error($link);
						echo '</p>';
						exit;
					}
                    while($fila5 = mysqli_fetch_assoc($resultado5)) {
                    	switch ($fila5['Pais']) {
						    case 1:
						        $npais="España";
						        break;
						    case 2:
						        $npais="Argentina";
						        break;
						    case 3:
						        $npais="Inglaterra";
						        break;
						    case 4:
						        $npais="Francia";
						        break;
						    case 5:
						        $npais="Alemania";
						        break;
						}
						 echo "<p><strong>Titulo:</strong>".$fila5['Titulo']."</p>";
						 echo "<p><strong>Fecha:</strong>".$fila5['FRegistro']."</p>";
						 echo "<p><strong>Pais:</strong>".$npais."</p>";
                    } 
				?>
			</div>
		</div>
		<div id="enbusc">
			<a class="enlacebusqueda" href="FormularioBus.php">Realizar búsqueda</a>
		</div>		
    <?php
    include("pie.php");
    ?>
</body>
</html>