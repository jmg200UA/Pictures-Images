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
    <title>Pictures & images - Mis fotos</title>
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

            //PILLAMOS ALBUMES DEL USUARIO
            $sentenciaAlbum = 'SELECT * from albumes';

            if(!($resultadoAlbum = @mysqli_query($link, $sentenciaAlbum))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }

            while($filaAlbum = mysqli_fetch_assoc($resultadoAlbum)) {
               if($filaAlbum['Usuario']==$idususes){
                    //FOTOS DE CADA ALBUM DEL USUARIO
                    $sentenciafotos="SELECT Titulo,Album from fotos WHERE Album='".$filaAlbum['IdAlbum']."'";
                    if(!($resultadofotos = @mysqli_query($link, $sentenciafotos))) {
                        echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                        echo '</p>';
                        exit;
                    }
                    while($filafotos = mysqli_fetch_assoc($resultadofotos)) {
                        echo "<p>".$filafotos['Titulo']."</p>";
                        echo '<a href="VerAlbum.php?idalbum='.$filaAlbum['IdAlbum'].'">';
                        echo "<p><strong>Album al que pertenece: </strong>".$filaAlbum['Titulo']."</p></a>";
                    }

               }
            }

        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>