<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Recepcion SoliAlbum</title>
    </head>
    <body>
        <?php
        $nombre=$_GET['nombre'];
        $titulo=$_GET['tituloalbum'];
        $texto=$_GET['textoadicional'];
        $color=$_GET['color'];
        $copias=$_GET['numcopias'];
        echo "Nombre: ".$nombre."<BR>";
        echo "Titulo del album: ".$titulo."<BR>";
        echo "Texto adicional: ".$texto."<BR>";
        echo "Color de portada: ".$color."<BR>";
        echo "Numero de copias: ".$copias."<BR>";
        ?>      
    </body>
</html>