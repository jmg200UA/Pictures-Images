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
        $contraintro= $_POST['contra'];
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];
        $repetir = $_POST['repetir'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $fecha = $_POST['fecha'];
        $valorPais = $_POST['pais'];
        $valorCiudad = $_POST['ciudad'];
        $contraUsu="";
        $idusu="";
        $nomfoto="";
        switch ($valorPais) {
            case "España":
                $valorPais=1;
                break;
            case "Argentina":
                $valorPais=2;
                break;
            case "Inglaterra":
                $valorPais=3;
                break;
            case "Francia":
                $valorPais=4;
                break;
            case "Alemania":
                $valorPais=5;
                break;
        }
        //$valorFecha=strtotime(date($valorFecha,time()));
		if(isset($_SESSION["nombre"])){
            //PILLAMOS EL ID DEL USUARIO
            
            $sentenciaUsu = 'SELECT * from usuarios';
        
            if(!($resultadoUsu = @mysqli_query($link, $sentenciaUsu))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentenciaUsu</b>: " . mysqli_error($link);
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
            include("filtradoDatos.php");

            if(move_uploaded_file($_FILES["foto"]["tmp_name"], "D:/Martin/Desktop/xampp/htdocs/pagweb/pagweb/imagenes/FotosUsu/" . $_FILES["foto"]["name"])){
                    $nomfoto=$_FILES["foto"]["name"];
                }
                else
                    echo "Foto no cargada";

            if($contraintro==$contraUsu){

                $sentencia = "UPDATE usuarios SET NomUsuario='".$nombre."', Clave='".$contraseña."', Email='".$email."', Sexo='".$sexo."', FNacimiento='".$fecha."', Ciudad='".$valorCiudad."', Pais='".$valorPais."', Foto='".$nomfoto."' WHERE IdUsuario='".$idusu."'";
                //$sentencia ="UPDATE nombreDeLaTabla SET NomUsuario = '.$valorNombre.', campoDos = 'valorCampoDos' WHERE alguna_columna = 'algun_valor'"
            
                $query=mysqli_query($link,$sentencia);
                //mysql_query($sentencia);

                

                if($query){
                    $_SESSION["nombre"]= $nombre;
                    echo'<script type="text/javascript">
                    alert("OK. Se han actualizado los datos correctamente");
                    window.location.href="UsuRegistrado.php";
                    </script>';
                } 
                else{
                    echo'<script type="text/javascript">
                    alert("Error. No se pudo actualizar");
                    window.location.href="Mis datos.php";
                    </script>';
                }

                mysqli_close($link);
            }
            else{
                echo'<script type="text/javascript">
                alert("Error. La contraseña no es correcta");
                window.location.href="MisDatos.php";
                </script>';
            }
        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>