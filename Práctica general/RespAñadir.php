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
    <title>Pictures & images - Respuesta añadir foto</title>
</head>
<body>
    <header>
        <?php
        include("enlaceprincipal.php");
        ?>
    </header>
    <?php
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['desc'];
    $fecha = $_POST['fecha'];
    $pais = $_POST['pais'];
    $textoalt = $_POST['textoalt'];
    $album = $_POST['albumes'];
    $nomfoto="";
    $nompais=$pais;
    $nomalbum=$album;

    switch ($pais) {
        case "España":
            $pais=1;
            break;
        case "Argentina":
            $pais=2;
            break;
        case "Inglaterra":
            $pais=3;
            break;
        case "Francia":
            $pais=4;
            break;
        case "Alemania":
            $pais=5;
            break;
    }

    switch ($album) {
        case "Atardeceres":
            $album=1;
            break;
        case "En el man":
            $album=2;
            break;
        case "Peces":
            $album=3;
            break;
    }


    if($titulo==""){
        echo'<script type="text/javascript">
        alert("Error. Debes rellenar el campo titulo");
        window.location.href="AñadirFotoAlbum.php";
        </script>';
    }

    if(strlen($textoalt) < 10){
        echo'<script type="text/javascript">
        alert("Error. El texto alternativo debe tener al menos 10 caracteres");
        window.location.href="AñadirFotoAlbum.php";
        </script>';
    }

    if (!preg_match('/^(?!Foto|foto|Imagen|imagen.*$).*/', $textoalt)){
        echo'<script type="text/javascript">
        alert("Error. El texto alternativo no puede empezar por las palabras foto o imagen");
        window.location.href="AñadirFotoAlbum.php";
         </script>';
    }

    if(move_uploaded_file($_FILES["foto"]["tmp_name"], "D:/Martin/Desktop/xampp/htdocs/pagweb/pagweb/imagenes/FotosAlbum/" . $_FILES["foto"]["name"])){
            $nomfoto=$_FILES["foto"]["name"];
        }
        else
            echo "Foto no cargada";

    $sentenciaB = "INSERT INTO fotos (Titulo, Descripcion, Fecha, Pais, Alternativo, Album, Fichero, FRegistro) VALUES ('$titulo', '$descripcion','$fecha','$pais','$textoalt','$album','$nomfoto','".date("c")."')";

    $query=mysqli_query($link,$sentenciaB);
    mysqli_insert_id($link);

    if($query) echo "Inserción realizada correctamente";
    else echo "NO";




    echo "<p>Inserción realizada, tus datos son:<p>";
    echo "<p>Titulo: ".$titulo. "</p>";
    echo "<p>Descripción: ".$descripcion. "</p>";
    echo "<p>Fecha: ".$fecha. "</p>";
    echo "<p>País: ".$nompais. "</p>";
    echo "<p>Foto: ".$nomfoto. "</p>";
    echo "<p>Texto alternativo: ".$textoalt. "</p>";
    echo "<p>Álbum: ".$nomalbum. "</p>";
    echo '<img src="imagenes/FotosUsu/'.$nomfoto.'" alt="'.$nomfoto.'" style="width: 100px;height: 100px; border-radius: 50px / 25px;">';
    ?>

    







 </body>
</html>