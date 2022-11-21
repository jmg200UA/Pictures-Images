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
    <title>Pictures & images - Mis Albumes</title>
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
        <?php
        include("links.php");
            if(isset($_SESSION["nombre"])){
                //PILLAMOS EL ID DEL USUARIO
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
                        break;
                    } 
                }

                $sentencia = "SELECT * from albumes WHERE Usuario='".$idususes."'";
            
                if(!($resultado = @mysqli_query($link, $sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                    echo '</p>';
                    exit;
                }
                while($fila = mysqli_fetch_assoc($resultado)) {
                    echo '<a href="VerAlbum.php?idalbum='.$fila['IdAlbum'].'">';
                    echo "<p><strong>Título del album: </strong>".$fila['Titulo']."</p></a>";
                    echo "<p><strong>Descripción:</strong>".$fila['Descripcion']."</p>";
                }           
        }
    ?>
    <a href="MisFotos.php"><strong>Mis fotos</strong></a>
    <?php
    include("pie.php");
    ?>
    </body>
</html>