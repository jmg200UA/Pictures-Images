<?php
session_start();         
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Control Acceso</title>
    </head>
    <body>
        <h2>
        <?php
        $nombre=$_POST['nombre'];
        $contra=$_POST['contraseña'];
        $valida = 0;
        include("links.php");
            $sentencia = 'SELECT * FROM usuarios';
                if(!($resultado = @mysqli_query($link, $sentencia))) {
                    echo "<p>Error al ejecutar la sentencia <b>$sentencia</b>: " . mysqli_error($link);
                    echo '</p>';
                    exit;
                }
                while($fila = mysqli_fetch_assoc($resultado)) {
                    if($fila['NomUsuario'] == $nombre){
                        $valida = 1;
                        $_SESSION["nombre"]= $nombre;
                        if (isset($_POST['conditions'])){
                            setcookie("estilo", $fila['Estilo'], time() + 60*60*24*90);
                            setcookie("usuario", base64_encode($_SESSION["nombre"]), time() + 60*60*24*90);
                            setcookie("contra", password_hash($fila['Clave'], PASSWORD_DEFAULT), time() + 60*60*24*90);
                            header("Location: UsuRegistrado.php");
                        }
                    }
                    if($valida == 1){
                    break;
                    }
                }
            

                if($nombre=="" || $contra==""){
                    echo'<script type="text/javascript">
                    alert("Error. Debes rellenar los campos nombre y contraseña");
                    window.location.href="index.php";
                    </script>';

                }
                if($valida == 0){

                    echo'<script type="text/javascript">
                    alert("Error. No estás registrado");
                    window.location.href="index.php";
                    </script>';
                }

        ?> 
        </h2>    
    </body>
</html>