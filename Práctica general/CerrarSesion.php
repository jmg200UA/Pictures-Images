<?php
session_start(); 
session_destroy();      
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
            <h1><a href="index.php"><strong>PICTURES & IMAGES</strong></a></h1>
        </header>
        <p>Se ha cerrado la sesión</p>
        <?php
        if(isset($_SESSION["nombre"])){

            $idususes="";
            $sentenciaUsu = 'SELECT * from usuarios';
        
            if(!($resultadoUsu = @mysqli_query($link, $sentenciaUsu))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }
            while($filaUsu = mysqli_fetch_assoc($resultadoUsu)) {
                if($_SESSION["nombre"]==$filaUsu['NomUsuario']){
                    $idususes=$filaUsu['IdUsuario'];
                    if(isset($_COOKIE["usuario"])){
                        setcookie("usuario","",time()-(60*60*24*90));
                        setcookie("contra","",time()-(60*60*24*90));
                        setcookie("ultima","",time()-(60*60*24*90));
                    }
                    break;
                } 
            }
        }      
  
        ?>
        <div><p><a href="index.php">Volver a la página de inicio</a></p></div>
        
        <?php
        include("pie.php");
        ?>
    </body>
</html>