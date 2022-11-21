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
    <title>Pictures & images - Ver Album</title>
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>   
    </header>
    <?php
        include("links.php");
        if($_GET['idalbum']==1){
            $array1 = array();
            $i=0;
            $sentencia1 = 'SELECT Titulo,Descripcion,Pais,Album, Fecha from fotos WHERE album=1';
            $sentenciaA1 = 'SELECT albumes.Descripcion, Pais, Fecha, albumes.Titulo FROM fotos, albumes WHERE Album=IdAlbum AND Album=1';

            if(!($resultado1 = @mysqli_query($link, $sentencia1))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }
            if(!($resultadoA1 = @mysqli_query($link, $sentenciaA1))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentenciaA1</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }

            $filaA1 = mysqli_fetch_assoc($resultadoA1);
            echo "<h3><strong>Titulo del album: </strong>".$filaA1['Titulo']."</h3>";
            echo "<p><strong>Descripción del album:</strong>".$filaA1['Descripcion']."</p>";

            while($fila1 = mysqli_fetch_assoc($resultado1)) {
                switch ($fila1['Pais']) {
                    case 1:
                        $npais="España";
                        break;
                    case 2:
                        $npais="Argentina";
                        break;
                    case 3:
                        $npais="Inglaterra";
                        break;
                    case 4:
                        $npais="Francia";
                        break;
                    case 5:
                        $npais="Alemania";
                        break;
                }
                echo "<p><strong>Foto del album:</strong>".$fila1['Titulo']." <strong> - Pais en el que fue tomada: </strong>$npais</p>";
                $array1[$i]=$fila1['Fecha'];
                //echo "Valor:".$array1[$i]."";
                $i++;

            }
            $i=0;
            while($array1[$i]<count($array1)){
                $fecha1=strtotime(date($array1[$i],time()));
                $fecha2=strtotime(date($array1[$i+1],time()));
                if($fecha1>$fecha2){
                    $aux=$array1[$i];
                    $array1[$i]=$array1[$i+1];
                    $array1[$i+1]=$aux;
                }
                $i++;
                if($array1[$i+1]==null) break;   
            }
            
            echo "Fecha más antigua: ".$array1[count($array1)-1]." | Fecha más actual: ".$array1[0]."";
        }
        if($_GET['idalbum']==2){   
            $array2 = array();
            $i=0;
            $sentencia2 = 'SELECT Titulo,Descripcion,Pais,Album, Fecha from fotos WHERE album=2';
            $sentenciaA2 = 'SELECT albumes.Descripcion, Pais, Fecha, albumes.Titulo FROM fotos, albumes WHERE Album=IdAlbum AND Album=2';

            if(!($resultado2 = @mysqli_query($link, $sentencia2))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentencia1</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }
            if(!($resultadoA2 = @mysqli_query($link, $sentenciaA2))) {
                echo "<p>Error al ejecutar la sentencia <b>$sentenciaA2</b>: " . mysqli_error($link);
                echo '</p>';
                exit;
            }

            $filaA2 = mysqli_fetch_assoc($resultadoA2);
            echo "<h3><strong>Titulo del album: </strong>".$filaA2['Titulo']."</h3>";
            echo "<p><strong>Descripción del album:</strong>".$filaA2['Descripcion']."</p>";
            
            while($fila2 = mysqli_fetch_assoc($resultado2)) {
                switch ($fila2['Pais']) {
                    case 1:
                        $npais="España";
                        break;
                    case 2:
                        $npais="Argentina";
                        break;
                    case 3:
                        $npais="Inglaterra";
                        break;
                    case 4:
                        $npais="Francia";
                        break;
                    case 5:
                        $npais="Alemania";
                        break;
                }
                echo "<p><strong>Foto del album:</strong>".$fila2['Titulo']." <strong> - Pais en el que fue tomada: </strong>$npais</p>"; 
                $array2[$i]=$fila2['Fecha'];
                //echo "Valor:".$array1[$i]."";
                $i++;
            }

            $i=0;
            while($array2[$i]<count($array2)){
                $fecha1=strtotime(date($array2[$i],time()));
                $fecha2=strtotime(date($array2[$i+1],time()));
                if($fecha1>$fecha2){
                    $aux=$array1[$i];
                    $array2[$i]=$array2[$i+1];
                    $array2[$i+1]=$aux;
                }
                $i++;
                if($array2[$i+1]==null) break;   
            }
            
            echo "Fecha más antigua: ".$array2[count($array2)-1]." | Fecha más actual: ".$array2[0]."";
        }
    ?>
    <?php
    include("pie.php");
    ?>
    </body>
</html>