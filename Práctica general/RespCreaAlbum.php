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
    <title>Pictures & images - Respuesta crea album</title>
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
    <?php
            require 'links.php';
    
            $idususes="";
            $sentenciaUsu = 'SELECT * from usuarios';

            if(!($resultadoUsu = @mysqli_query($link, $sentenciaUsu))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }

            while($filaUsu = mysqli_fetch_assoc($resultadoUsu)) {
                if($_SESSION["nombre"]==$filaUsu['NomUsuario']){
                    $idususes=$filaUsu['IdUsuario'];
                    break;
                } 
            }

            
            $titulo = $_POST['titul'];
            $descripcion = $_POST['descripcion'];

            $sentencia = "INSERT INTO albumes (Titulo,Descripcion,Usuario) VALUES ('$titulo', '$descripcion','$idususes')";
            
            $query=mysqli_query($link,$sentencia);
            mysqli_insert_id($link);

            if($query) echo "Inserción realizada correctamente";
            else echo "NO";
            
            echo "<p>¿Quieres introducir una foto en tu nuevo álbum?";
            echo '<p><a href="AñadirFotoAlbum.php">Añadir foto</a></p>';
            mysqli_close($link);
        ?>
<body>
<html>


        