<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
	<head>
	<?php
    include("cabecera.php");
    ?>
	</head>
	<body>
		<header>
			<!--LOGOTIPO -->
			<h1><a href="index.php"><strong>PICTURES & IMAGES</strong></a></h1>
        </header>
		<div id="detalle">
		<?php
                include("links.php");
				if(isset($_SESSION["nombre"])){
					if($_GET['idfoto']==1){
						$sentencia1 = 'SELECT * from fotos WHERE IdFoto=1';
						if(!($resultado1 = @mysqli_query($link, $sentencia1))) {
							echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
							echo '</p>';
							exit;
						}

						while($fila1 = mysqli_fetch_assoc($resultado1)) {
							switch ($fila1['Pais']) {
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
							switch ($fila1['Album']) {
								case 1:
									$nalbum="Atardeceres";
									break;
								case 2:
									$nalbum="En el mar";
									break;
							}
							echo '<img src="imagenes/'.$fila1["Fichero"].'" alt="atardecer">';
							echo "<p><strong>Titulo: </strong>".$fila1['Titulo']."</p>";
							echo "<p><strong>Fecha: </strong>".$fila1['Fecha']."</p>";
							echo "<p><strong>Descripcion: </strong>".$fila1['Descripcion']."</p>";
							echo "<p><strong>Pais: </strong>".$npais."</p>";
							echo '<a href="VerAlbumPriv.php?idalbum=1">';
							echo "<p><strong>Álbum: </strong>".$nalbum."</p></a>";
							echo '<a href="PerfilUsu.php">';
							echo "<p><strong>Usuario: </strong>".$_SESSION["nombre"]."</p></a>";
						} 
					}

					if($_GET['idfoto']==2){
						$sentencia2 = 'SELECT * from fotos WHERE IdFoto=2';
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
							switch ($fila2['Album']) {
								case 1:
									$nalbum="Atardeceres";
									break;
								case 2:
									$nalbum="En el mar";
									break;
							}
							echo '<img src="imagenes/'.$fila2["Fichero"].'." alt="atardecer">';
							echo "<p><strong>Titulo: </strong>".$fila2['Titulo']."</p>";
							echo "<p><strong>Fecha: </strong>".$fila2['Fecha']."</p>";
							echo "<p><strong>Descripcion: </strong>".$fila2['Descripcion']."</p>";
							echo "<p><strong>Pais: </strong>".$npais."</p>";
							echo '<a href="VerAlbumPriv.php?idalbum=1">';
							echo "<p><strong>Álbum: </strong>".$nalbum."</p></a>";
							echo '<a href="PerfilUsu.php">';
							echo "<p><strong>Usuario: </strong>".$_SESSION["nombre"]."</p></a>";
						} 
					}

					if($_GET['idfoto']==3){
						$sentencia3 = 'SELECT * from fotos WHERE IdFoto=3';
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
							switch ($fila3['Album']) {
								case 1:
									$nalbum="Atardeceres";
									break;
								case 2:
									$nalbum="En el mar";
									break;
							}
							echo '<img src="imagenes/'.$fila3["Fichero"].'" alt="atardecer">';
							echo "<p><strong>Titulo: </strong>".$fila3['Titulo']."</p>";
							echo "<p><strong>Fecha: </strong>".$fila3['Fecha']."</p>";
							echo "<p><strong>Descripcion: </strong>".$fila3['Descripcion']."</p>";
							echo "<p><strong>Pais: </strong>".$npais."</p>";
							echo '<a href="VerAlbumPriv.php?idalbum=2">';
							echo "<p><strong>Álbum: </strong>".$nalbum."</p></a>";
							echo '<a href="PerfilUsu.php">';
							echo "<p><strong>Usuario: </strong>".$_SESSION["nombre"]."</p></a>";
						} 
					}

					if($_GET['idfoto']==4){
						$sentencia4 = 'SELECT * from fotos WHERE IdFoto=4';
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
							switch ($fila4['Album']) {
								case 1:
									$nalbum="Atardeceres";
									break;
								case 2:
									$nalbum="En el mar";
									break;
							}
							echo '<img src="imagenes/'.$fila4["Fichero"].'" alt="atardecer">';
							echo "<p><strong>Titulo: </strong>".$fila4['Titulo']."</p>";
							echo "<p><strong>Fecha: </strong>".$fila4['Fecha']."</p>";
							echo "<p><strong>Descripcion: </strong>".$fila4['Descripcion']."</p>";
							echo "<p><strong>Pais: </strong>".$npais."</p>";
							echo '<a href="VerAlbumPriv.php?idalbum=2">';
							echo "<p><strong>Álbum: </strong>".$nalbum."</p></a>";
							echo '<a href="PerfilUsu.php">';
							echo "<p><strong>Usuario: </strong>".$_SESSION["nombre"]."</p></a>";
						} 
					}

					if($_GET['idfoto']==5){
						$sentencia5 = 'SELECT * from fotos WHERE IdFoto=5';
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
							switch ($fila5['Album']) {
								case 1:
									$nalbum="Atardeceres";
									break;
								case 2:
									$nalbum="En el mar";
									break;
							}
							echo '<img src="imagenes/'.$fila5["Fichero"].'" alt="atardecer">';
							echo "<p><strong>Titulo: </strong>".$fila5['Titulo']."</p>";
							echo "<p><strong>Fecha: </strong>".$fila5['Fecha']."</p>";
							echo "<p><strong>Descripcion: </strong>".$fila5['Descripcion']."</p>";
							echo "<p><strong>Pais: </strong>".$npais."</p>";
							echo '<a href="VerAlbumPriv.php?idalbum=2">';
							echo "<p><strong>Álbum: </strong>".$nalbum."</p></a>";
							echo '<a href="PerfilUsu.php">';
							echo "<p><strong>Usuario: </strong>".$_SESSION["nombre"]."</p></a>";
						} 
					}
				}

            ?> 
		</div>
	
		<?php
    	include("pie.php");
    	?>
	</body>
</html>