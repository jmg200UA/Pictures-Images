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
        
        require 'links.php';
        $eleccion= $_GET['estilos'];
        $idusu="";
        switch ($eleccion) {
            case "Dia":
                $eleccion=1;
                break;
            case "Alto contraste":
                $eleccion=2;
                break;
        }
		if(isset($_SESSION["nombre"])){
            //PILLAMOS EL ID DEL USUARIO
            
            $sentenciaUsu = 'SELECT * from usuarios';
        
            if(!($resultadoUsu = @mysqli_query($link, $sentenciaUsu))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }
            while($filaUsu = mysqli_fetch_assoc($resultadoUsu)) {
                if($_SESSION["nombre"]==$filaUsu['NomUsuario']){
                    $contraUsu=$filaUsu['Clave'];
                    $idusu=$filaUsu['IdUsuario'];
                    break;
                } 
            }
            echo ".$eleccion.";

                $sentencia = "UPDATE usuarios SET Estilo='".$eleccion."' WHERE IdUsuario='".$idusu."'";
                //$sentencia ="UPDATE nombreDeLaTabla SET NomUsuario = '.$valorNombre.', campoDos = 'valorCampoDos' WHERE alguna_columna = 'algun_valor'"
            
                $query=mysqli_query($link,$sentencia);
                //mysql_query($sentencia);

                if($query){
                    echo'<script type="text/javascript">
                    alert("OK. El estilo se ha cambiado correctamente");
                    window.location.href="UsuRegistrado.php";
                    </script>';
                } 
                else{
                    echo'<script type="text/javascript">
                    alert("OK. El estilo no se ha podido cambiar");
                    window.location.href="configurar.php";
                    </script>';
                }

                mysqli_close($link);
            
        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>