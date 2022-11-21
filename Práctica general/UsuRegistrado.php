<?php
session_start();         
?>
<!DOCTYPE html>
<html lang="es">
    <head>
    <?php
    include("cabecera.php");
    ?>
    <title>Pictures & images - Usuario registrado</title>
    </head>
    <body>
        <header>
            <h1><a href="indexlog.php"><strong>PICTURES & IMAGES</strong></a></h1>
        </header>
        <?php
            if(isset($_SESSION["nombre"])){
                    echo "<p> Hola " . $_SESSION["nombre"]. " qué quieres hacer<p>";
            }
            else echo "No se ha guardado la sesión";         
        ?>
        <p><a href="MisDatos.php">Mis datos</a></p>
        <p><a href="DarBaja.php">Darme de baja</a></p>
        <p><a href="MisAlbumes.php">Mis álbumes</a></p>
        <p><a href="CreaAlbum.php">Crear álbum</a></p>
        <p><a href="SoliAlbum.php">Solicitar álbum</a></p>  
        <p><a href="Configurar.php">Configurar estilo</a></p> 
        <p><a href="AñadirFotoAlbum.php">Añadir foto a álbum</a></p> 
        <?php
        include("pie.php");
        ?>
    </body>
</html>