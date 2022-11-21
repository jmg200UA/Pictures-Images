<?php
session_start();
if(isset($_SESSION["nombre"])==null){
    echo'<script type="text/javascript">
        alert("Error. No estás logueado");
        window.location.href="index.php";
        </script>';
}
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
        <div style="text-align: center;"><form id="formid" action="RespConfigurar.php" method="GET">
        
            <h2>Estilos de la página</h2>
            <?php
    
                include("links.php");
                $sentencia = 'SELECT * FROM estilos';
                if(!($resultado = @mysqli_query($link, $sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                    echo '</p>';
                    exit;
                }

                echo '<p><label for="estilos"><strong>Estilos: </strong></label><br>
                <select name="estilos">';
                while($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='".$fila['Nombre']."'>".$fila['Nombre']."</option>";
                }
                echo '</select></p>';
            ?>
            <input type="submit" value="Cambiar estilo">
        </form>  
        </div><br>
    </body>
    <?php
    include("pie.php");
    ?>
</html>
