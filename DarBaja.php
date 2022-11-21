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
    <title>Pictures & images - Registro</title>
</head>
<body>
    <header>
        <!--LOGOTIPO -->
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
    
    <div style="text-align: center;">
            <fieldset><legend>Registro</legend>

            <?php
            $contra="";
            $email="";
            $sexo="";
            $fecha="";
            $pais="";
            $ciudad="";

            include("links.php");
                

                // listado de los álbumes con el número de fotos que contiene cada álbum
                //número total de fotos que tiene el usuario

                if(isset($_SESSION["nombre"])){
		            //PILLAMOS EL ID DEL USUARIO
		            $fotosalbum=0;
		            $fotostot=0;
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
		               		$fotosalbum=0;
		               		echo "<p><strong>Álbum: </strong>".$filaAlbum['Titulo']."";
		                    $sentenciafotos="SELECT Titulo,Album from fotos WHERE Album='".$filaAlbum['IdAlbum']."'";
		                    if(!($resultadofotos = @mysqli_query($link, $sentenciafotos))) {
		                        echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
		                        echo '</p>';
		                        exit;
		                    }
		                    while($filafotos = mysqli_fetch_assoc($resultadofotos)) {
		                        $fotosalbum=$fotosalbum+1;
		                    }
		                    echo "<p><strong>Número de fotos: </strong>".$fotosalbum."";
		                    $fotostot=$fotostot+$fotosalbum;
		               }
		            }

		        }
		        echo "<p><strong>Número total de fotos: </strong>".$fotostot."";

		        echo "<div>";
		        echo "<p><strong>Introduce tu contraseña para confirmar la baja</strong></p>";
		        echo '<form action="ConfirmarBaja.php" method="GET"><input type="text" id="contra" name="contra"></form>';
		        echo "</div>";


                /*echo '<p>Nombre Usuario: '.$_SESSION["nombre"].'</p>';
                echo '<p>Contraseña: '.$contra.'</p>';
                echo '<p>Email: '.$email.'</p>';
                echo '<p>Sexo: '.$sexo.'</p>';
                echo '<p>Fecha: '.$fecha.'</p>';
                echo '<p>País: '.$pais.'</p>';
                echo '<p>Ciudad: '.$ciudad.'</p>';*/
            ?>
            </fieldset>
    </div>
    <?php
    include("pie.php");
    ?>
</body>
</html>