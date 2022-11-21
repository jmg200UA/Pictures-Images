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
    <title>Pictures & images - Respuesta album</title>
    </head>
    <body>
        <header>
            <!--LOGOTIPO -->
            <?php
            include("enlaceprincipal.php");
            ?> 
        </header>
        <section>
            <h2>Su solicitud de álbum ha sido registrada correctamente</h2>
                <article>
                    <h3>Datos del pedido:</h3>
                    <p>
                    <?php
                    $numpags = 1;
                    $numfotos = 3;
                    $valor="";
                    $nombre=$_GET['nombre'];
                    $titulo=$_GET['tituloalbum'];
                    $texto=$_GET['textoadicional'];
                    $color=$_GET['color'];
                    $copias=$_GET['numcopias'];
                    $dpi = $_GET['resolucion'];
                    $bw = $_GET['impcolor'];
                    $nomalbum=$_GET['albumes'];
                    $email=$_GET['email'];
                    $direccion=$_GET['direccion'];
                    $fecha=$_GET['fecha'];
                    $icolor=$_GET['impcolor'];
                    echo "Nombre: ".$nombre."<BR>";
                    echo "Titulo del album: ".$titulo."<BR>";
                    echo "Texto adicional: ".$texto."<BR>";
                    echo "Color de portada: ".$color."<BR>";
                    echo "Numero de copias: ".$copias."<BR>";
                    echo "".date("c")."";

                    switch ($nomalbum) {
                        case "Atardeceres":
                            $nomalbum=1;
                            break;
                        case "En el man":
                            $nomalbum=2;
                            break;
                        case "Peces":
                            $nomalbum=3;
                            break;
                    }

                    switch ($icolor) {
                        case "A todo color":
                            $album = true;
                            break;
                        case "Blanco y negro":
                            $album= false;
                            break;
                    }

                    if(($dpi==150 || $dpi==300) && ($bw == "Blanco y negro")){
                        $valor = 0.10 * $copias;
                    }

                    if(($dpi==450 || $dpi==900) && ($bw == "Blanco y negro")){
                        $valor = 0.16 * $copias;
                    }

                    if(($dpi==150 || $dpi==300) && ($bw == "A todo color")){
                        $valor = 0.25 * $copias;
                    }

                    if(($dpi==450 || $dpi==900) && ($bw == "A todo color")){
                        $valor = 0.31 * $copias;
                    }

                    echo "<p>El precio del álbum es de <strong>".$valor."€</strong>. Gracias por su pedido</p>"
                    ?>
                    </p>
                </article>
        </section>  
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


            $sentencia = "INSERT INTO solicitudes (Album,Nombre,Titulo,Descripcion,Email,Direccion,Color,Copias,Resolucion,Fecha,IColor,FRegistro,Coste) VALUES ('$nomalbum','$nombre', '$titulo','$texto','$email','$direccion','$color','$copias','$dpi','$fecha','$icolor','".date("c")."','$valor')";
            
            $query=mysqli_query($link,$sentencia);
            mysqli_insert_id($link);

            if($query) echo "OK";
            else echo "NO";

            mysqli_close($link);
            
        ?>  
            
        <?php
        include("pie.php");
        ?>
    </body>
</html>