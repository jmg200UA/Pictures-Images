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
			<fieldset>
				<div id="DatosUsu">
				<?php
				include("links.php");
					$sentencia = 'SELECT * FROM usuarios';
						if(!($resultado = @mysqli_query($link, $sentencia))) {
							echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
							echo '</p>';
							exit;
						}
		
					if(isset($_SESSION["nombre"])){
						echo "<p><strong>Nombre de usuario: </strong>" . $_SESSION["nombre"]. "<p>";

						if(isset($_COOKIE['usuario'])!=null){
							$ultima = isset($_COOKIE['ultima']) ? $_COOKIE['ultima'] : "Primera vez";
							$actual = date("c");
							setcookie("ultima", $actual, (time() + 60*60*24*90));
							echo "<p><strong>Fecha y hora de la última visita: </strong>" . $ultima. "<p>";
							echo "<p><strong>Fecha y hora actual: </strong>" . $actual. "<p>";

							$sentenciaU = 'SELECT * FROM usuarios';
							if(!($resultadoU = @mysqli_query($link, $sentenciaU))) {
								echo "<p>Error al ejecutar la sentencia <b>$sentenciaU</b>: " . mysqli_error($link);
								echo '</p>';
							exit;
						}

						while($filaU = mysqli_fetch_assoc($resultadoU)) {
							if($_SESSION["nombre"] == $filaU["NomUsuario"]){
								echo '<img src="imagenes/FotosUsu/'.$filaU["Foto"].'" alt="'.$filaU["Foto"].'" style="width: 100px;height: 100px; border-radius: 50px / 25px;">';
								echo "<p><strong>Foto Usuario: </strong>".$_SESSION["nombre"]."</p>";
							}
						}

						}else{
							echo "<p>Fecha y hora de la última visita: Debes recordar en este equipo para mostrar esta opción<p>";
							echo "<p>Fecha y hora actual: Debes recordar en este equipo para mostrar esta opción<p>";
						}		
					
					}else{
						echo'<script type="text/javascript">
					alert("Error. No estás logueado");
					window.location.href="index.php";
					</script>';
					}
					echo '<form action="CerrarSesion.php"><input class="ini2" type="submit" value="Salir"></form>';
					?>
					</div>
					
				</fieldset>
				<fieldset>
						<h2>Consejo del dia</h2>
						<?php
							$data = file_get_contents("consejos.json");
							$products = json_decode($data, true);

							$aleatorio=rand(0,4);
								$iterator=0;
							 
							echo "<strong>Categoria: </strong>". $products[$aleatorio]["categoria"]."<br>";
							echo "<strong>Dificultad: </strong>".$products[$aleatorio]["dificultad"]."<br>";
							echo "<strong>Descripción: </strong>".$products[$aleatorio]["descripcion"]."<br>";
						?>
					</fieldset>
					<fieldset>
						<h2>Foto del día</h2>
						<?php
							$aleatorio=rand(0,4);
							$iterator=0;
							$foto="";

							$fichero= fopen("datos.txt", "r");

							while(!feof($fichero)){
								$linea=fgets($fichero);
								if($iterator==$aleatorio){
									$foto=$linea;
								}
								$iterator++;
							}

							fclose($fichero);
							echo '<img src="imagenes/'.$foto.'" alt="'.$foto.'" style="width: 100px;height: 100px; border-radius: 50px / 25px;">';
						?>
					</fieldset><br>
				<div>
					<a class="enlace" href="UsuRegistrado.php">Mi perfil</a>
				</div>				
			</header>
			
			<h2>Últimas fotos</h2>
			<div id="cajas">
				<div>
					<a href="DetalleFoto.php?idfoto=1"><img src="imagenes/Arbol.jpg" alt="imagen2"></a>
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
					<a href="DetalleFoto.php?idfoto=2"><img src="imagenes/playa.jpg" alt="imagen2"></a>
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
					<a href="DetalleFoto.php?idfoto=3"><img src="imagenes/mar.jpg" alt="imagen2"></a>
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
					<a href="DetalleFoto.php?idfoto=4"><img src="imagenes/isla.jpg" alt="imagen2"></a>
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
					<a href="DetalleFoto.php?idfoto=5"><img src="imagenes/corales.jpg" alt="imagen2"></a>
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
			
				<footer>
					<p>Copyright &copy;<time datetime="2020"> 2020 </time> &nbsp; Javier Martín - Daniel Laguna &nbsp; <a href="index.html" class="sb"> Sobre nosotros</a>
					&nbsp; <a href="Accesibilidad.html" class="sb">Declaración de accesibilidad</a></p>
				</footer>
		</body>
		
	</html>