<?php
session_start();  
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <?php
        include("cabecera.php");
        ?>
        <title>Pictures & images - Resultado busqueda</title>
    </head>
    <body>
        <header>
            <!--LOGOTIPO -->
            <?php
            include("enlaceprincipal.php");
            ?>    
        </header>
        <h2></h2>
        <div id="cajas">
        <?php

            include("links.php");
            $sentencia = 'SELECT * from fotos';
            if(!($resultado = @mysqli_query($link, $sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                    echo '</p>';
                    exit;
                }

            while($fila = mysqli_fetch_assoc($resultado)) {
                switch ($fila["Pais"]) {
                    case 1:
                        $pais="España";
                        break;
                    case 2:
                        $pais="Argentina";
                        break;
                    case 3:
                        $pais="Inglaterra";
                        break;
                    case 4:
                        $pais="Francia";
                        break;
                    case 5:
                        $pais="Alemania";
                        break;
                }
                    echo '<div>
                        <img src="imagenes/'.$fila["Fichero"].'" alt="atardecer">
                        <p><span class="icon-pencil"></span><strong>Título</strong> : '.$fila["Titulo"].'</p>
                        <p><span class="icon-calendar-empty"></span><strong>Fecha</strong> : '.$fila["Fecha"].'</p>
                        <p><span class="icon-eyedropper"></span><strong>País</strong> : '.$pais.'</p>
                    </div>';
                
            }
        ?>
        </div>
        <?php
        include("pie.php");
        ?>
    </body>
</html>