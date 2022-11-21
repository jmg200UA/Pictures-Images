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
    <title>Pictures & images - Perfil usuario</title>
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
                $sentencia = 'SELECT NomUsuario,Foto,FRegistro from usuarios';
            
                if(!($resultado = @mysqli_query($link, $sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                    echo '</p>';
                    exit;
                }
                while($fila = mysqli_fetch_assoc($resultado)) {
                    if($_SESSION["nombre"]==$fila['NomUsuario']){
                        echo "<p><strong>Nombre: </strong>".$fila['NomUsuario']."</p>";
                        echo "<p><strong>Fotos: </strong>".$fila['Foto']."</p>";
                        echo "<p><strong>Fecha de registro: </strong>".$fila['FRegistro']."</p>";
                        break;
                    }
                    
                }
                echo '<p><a href="VerAlbumPriv.php?idalbum=1">Albumes</a></p>';
        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>