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
        $valorContra = $_GET['contra'];
        $contraUsu="";
        $idusu="";
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
            //echo ''.$_SESSION["nombre"].'';

            if($valorContra==$contraUsu){


                $sentencia = 'DELETE from usuarios where IdUsuario='.$idusu;
            
                $query=mysqli_query($link,$sentencia);
                //mysql_query($sentencia);

                if($query){

                    echo'<script type="text/javascript">
                    alert("OK. Se ha dado la baja correctamente");
                    window.location.href="CerrarSesion.php";
                    </script>';
                } 
                else{
                    echo'<script type="text/javascript">
                    alert("Error. La contraseña no es correcta");
                    window.location.href="DarBaja.php";
                    </script>';
                }

                mysqli_close($link);
            }
            else{
                echo'<script type="text/javascript">
                alert("Error. La contraseña no es correcta");
                window.location.href="DarBaja.php";
                </script>';
            }

            //PILLAMOS ALBUMES DEL USUARIO
            /*$sentenciaAlbum = 'SELECT * from albumes';

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
            }*/

        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>